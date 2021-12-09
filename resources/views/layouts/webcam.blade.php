<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
    <div class="pannel"></div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('blog.png') }}" width="30" height="30" class="d-inline-block align-top" alt="blog">
        </a>

        <button class="burger-menu navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto order-1">
                <li class="nav-item">
                    <a href="/" class="nav-link navbar-link link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/webcam" class="nav-link navbar-link link">Webcam</a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link navbar-link link">Blog</a>
                </li>
            </ul>
{{--             <ul class="navbar-nav mr-auto order-2">
            <form action="{{ route('search') }}">
                    @csrf
                    <div class="input-group">
                    <input name="search" id="search" type="text" class="form-control bg-light border-0 small" style="width:300px;" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn" style="background:#47c9e5; border:#fff" type="button">
                        <i style="color:#fff;" class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form>

            </ul> --}}
            <ul class="navbar-nav d-none d-lg-flex ml-2 order-2">

                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link login-btn">Log in</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link register-btn">Register</a>
                    </li>
                @endif
                @endguest

                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-link link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px;">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name}}" style="width:32px; height:32px; position:absolute; top:5px; left:10px; border-radius:50%;">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right nav-dropdown animated--grow-in" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile', ['user' => Auth::user()->id, 'slug' => Auth::user()->slug]) }}">Your profile</a>
                        <a class="dropdown-item" href="{{ route('profile.edit', ['user' => Auth::user()->id ]) }}">Edit your profile</a>
                        <a class="dropdown-item" href="{{ route('article.create') }}">Create Blog</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="">Help</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item nav-dropdown" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div>
<div class="container mb-2">
    <h1 class="text-center">Information</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden"  name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                {{-- <button type="submit" class="btn btn-success mt-2">Submit</button> --}}
            </div>
        </div>
    </form>
</div>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

</body>
</html>
