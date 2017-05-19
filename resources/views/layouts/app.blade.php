<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
	<link href="/css/home.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body style="
    background: #d9de5e;
">
    <div >
        <nav class="navbar navbar-default navbar-static-top" style="background:#46a8a8">
            <div class="container ">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Войти</a></li>
                            <li><a href="{{ url('/register') }}">Зарегистрироваться</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
									<li>
                                        <a href="{{ url('/home') }}">Моя страница</a>                                    
                                    </li>
									 @if (Auth::user()->role_id==1)
									<li>
                                        <a href="{{ url('/admin') }}">Страница администратора</a>                                    
                                    </li>
									@endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<div class="col-md-3">
            <div class="panel panel-default" style="background:#a8c7cb">
                <div class="panel-heading" style="background:#46a8a8; color:#512324"><h1>Стили<h1></div>
                <div class="panel-body">
				<form action ="{{asset('/home/subscribe')}}" method="post">
					{{csrf_field()}}
                    @foreach($cats as $one)
					<div>
					<a href="{{asset('/catalog/'.$one->id)}}" class="btn btn-info btn-block">
					{{$one->name}}
					<input type="checkbox" name="{{$one->id}}" class="right" {{(isset($arr[$one->id]))?'checked':''}}	/>
						</a>
					</div>
					@endforeach
					<input type="submit" class="btn btn-default btn-block " value="Подписаться" />
					</form>
                </div>
				
            </div>
</div>
<div class="col-md-9">
        @yield('content')
</div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
