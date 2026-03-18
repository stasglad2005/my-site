<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Мой сайт')</title>
    <link rel="icon" href="{{ asset('/image/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=' . filemtime(public_path('css/style.css'))) }}">
    <style>
        body {
            background-image: url('/image/backgroundjpg.png');
            background-attachment: fixed;
        }
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <nav class="menu">
            <div id="date-time"></div>
            <ul>
                <li><a href="{{ url('/') }}" onmouseover="changeIcon('home.png')" onmouseout="resetIcon('home')"><img class="menu-icon" id="img-home" src="{{ asset('image/default.png') }}">Главная</a></li>
                <li><a href="{{ url('/about_me') }}" onmouseover="changeIcon('about-me.png')" onmouseout="resetIcon('about-me')"><img class="menu-icon" id="img-about-me" src="{{ asset('image/default.png') }}">Обо мне</a></li>
                <li><a href="{{ url('/interests') }}" onmouseover="changeIcon('interesting.png')" onmouseout="resetIcon('interesting')"><img class="menu-icon" id="img-interesting" src="{{ asset('image/default.png') }}">Мои интересы</a></li>
                <li><a href="{{ url('/study') }}" onmouseover="changeIcon('study.png')" onmouseout="resetIcon('study')"><img class="menu-icon" id="img-study" src="{{ asset('image/default.png') }}">Учеба</a></li>
                <li><a href="{{ url('/photoalbom') }}" onmouseover="changeIcon('photoalbom.png')" onmouseout="resetIcon('photoalbom')"><img class="menu-icon" id="img-photoalbom" src="{{ asset('image/default.png') }}">Фотоальбом</a></li>
                <li><a href="{{ url('/test') }}" onmouseover="changeIcon('test.png')" onmouseout="resetIcon('test')"><img class="menu-icon" id="img-test" src="{{ asset('image/default.png') }}">Тест по дисциплине</a></li>
                <li><a href="{{ url('/contact') }}" onmouseover="changeIcon('contact.png')" onmouseout="resetIcon('contact')"><img class="menu-icon" id="img-contact" src="{{ asset('image/default.png') }}">Контакты</a></li>
                <li><a href="{{ url('/history') }}" onmouseover="changeIcon('history.png')" onmouseout="resetIcon('history')"><img class="menu-icon" id="img-history" src="{{ asset('image/default.png') }}">История просмотра</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('/js/menu.js?v=' . filemtime(public_path('/js/menu.js'))) }}"></script>
    <script src="{{ asset('/js/dateShow.js?v=' . filemtime(public_path('/js/dateShow.js'))) }}"></script>
    @yield('scripts')
</body>
</html>