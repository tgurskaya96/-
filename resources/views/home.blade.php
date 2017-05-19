@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="background:#a8c7cb; color:#512324">
                <div class="panel-heading" style="background:#46a8a8"><h1>Твои музыкальные события</h1></div>
                <div class="panel-body" >
				@if($tovs)
                  @foreach ($tovs as $one)
				  <div class="col-md-6">
				  <h3><a href="{{asset ($one->id)}}"class="btn btn-success">{{$one->name}}</a></h3>
				  <h3>Где:{{$one->country}}</h3>
				  <h3>Цена: {{$one->price}}</h3>
				  <h3>Когда: {{$one->dateOfEvent}}</h3>
				  <img src="{{asset((isset($one->picture))?'uploads/thumb/'.$one->picture:'uploads/thumb/no_photo.jpg')}}"/>
				 </div> 
				 @endforeach
				 @endif
                </div>
            </div>
        </div>
    </div>
@endsection
