@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$y->name}}</div>
                <div class="panel-body">
                {!!$y->body!!}<br>
				{!!$y->price!!}<br>
				{!!$y->counrty!!}<br>
				{!!$y->dateOfEvent!!}<br>
				@if($y->picture != '')<img src="{{ asset('uploads') . '/'.  $y->picture }}">@endif
                </div>
            </div>
        </div>
    </div>
@endsection



