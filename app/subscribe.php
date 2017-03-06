<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    protected $filltable=[
	'user_id',
	'email',
	'body',
	'type'
	];
	
}
