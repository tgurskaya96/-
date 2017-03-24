@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>
                <div class="panel-body">
                  @foreach ($tovars as $one)
				  <div class="col-md-6">
				  <h2><a href="{{asset ($one->id)}}"class="btn">{{$one->name}}</a></h2>
				  <h2>{{$one->country}}</h2>
				  <h2>Price: {{$one->price}}</h2>
				  <h2>Date: {{$one->dateOfEvent}}</h2>
				  <img src="{{asset((isset($one->picture))?'uploads/thumb/'.$one->picture:'uploads/thumb/no_photo.jpg')}}"/>
				 </div> 
				 @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection



