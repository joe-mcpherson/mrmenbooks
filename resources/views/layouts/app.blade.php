<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('header_title')- Mr Men Documents Site</title>
        <!-- CSS And JavaScript -->
        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('/assets/css/app.main.css') }}" rel="stylesheet" type="text/css" /> 
        <script src="{{ asset('/lib/jquery/jquery-1.12.3.min.js') }}"></script>
        <script src="{{ asset('/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    </head>

    <body>
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo-link navbar-brand" href="/"><img src="{{ asset('/assets/images/happy.png') }}" alt="Mr Men Documents Site logo" style="width:50%; height:auto; margin-top:-15px;"/></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            @if ($active_nav == 'home')<li class="active"> @else <li> @endif<a href="/">Home</a></li>
                            @if ($active_nav == 'list')<li class="active"> @else <li> @endif<a href="/list">Document list</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div>

        <div class="container panel-body">
            @yield('content')
        </div>

    </body>
</html>