@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="background:#6ACD95">
                <div class="panel-heading " style="background:#DDA798; color:#636b6f">{{$y->name}}</div>
                <div class="panel-body"> 
            Описание: {!!$y->body!!}<br>
			Цена:{!!$y->price!!}<br>
			Место:	{!!$y->country!!}<br>
			Дата и время	{!!$y->dateOfEvent!!}<br>
				@if($y->picture != '')<img src="{{ asset('uploads') . '/'.  $y->picture }}">@endif
                </div>
            </div>
        </div>
    </div>
@endsection



