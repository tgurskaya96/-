@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="background:#6ACD95; color:#B4F63D">
                <div class="panel-heading" style="background:#DDA798">Твои музыкальные события</div>
                <div class="panel-body" >
				@if($tovs)
                  @foreach ($tovs as $one)
				  <div class="col-md-6">
				  <h2><a href="{{asset ($one->id)}}"class="btn btn-success">{{$one->name}}</a></h2>
				  <h2>Где:{{$one->country}}</h2>
				  <h2>Цена: {{$one->price}}</h2>
				  <h2>Когда: {{$one->dateOfEvent}}</h2>
				  <img src="{{asset((isset($one->picture))?'uploads/thumb/'.$one->picture:'uploads/thumb/no_photo.jpg')}}"/>
				 </div> 
				 @endforeach
				 @endif
                </div>
            </div>
        </div>
    </div>
@endsection
