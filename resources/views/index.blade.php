@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="background:#a8c7cb">
                <div class="panel-heading" style="background:#46a8a8">Добро пожаловать!</div>
				  <div class="panel-body">
              	  <p class="text-info">Надеемся, данный сайт поможет тебе узнать о последних концертах. У тебя есть возможность подписаться на рассылку о концертах групп и исполнителей твоих любимых стилей.</p>
				  @foreach ($tovars as $one)
				  <div class="col-md-6">
				  <h2><a href="{{asset ($one->id)}}"class="btn btn-info">
				  {{$one->name}}</a></h2>
				  <h2>Место:{{$one->country}}</h2>
				  <h2>Цена: {{$one->price}}</h2>
				  <h2>Дата: {{$one->dateOfEvent}}</h2>
				  <img src="{{asset((isset($one->picture))?'uploads/thumb/'.$one->picture:'uploads/thumb/no_photo.jpg')}}"/>
				 </div> 
				 @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection



