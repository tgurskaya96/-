<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\subscribe;
use App\Products;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
		Products::created(function($t){
			$id=$t->id;
			$all=subscribe::where('type','-')->get();
			foreach($all as $one){
			$arr=unserialize($one->body);
			foreach($arr as $two){
				if($two==$t->categories_id)
				mail($one->email,'Новый товар','Добавлен новый товар');
			}
			}
			//dd($t);
		});

        //
    }
}
