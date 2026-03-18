@extends('layout')

@section('title', 'Интересы')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/interests.css?v=' . filemtime(public_path('css/interests.css'))) }}">
@endsection

@section('content')
    <nav class="main-box nav-menu">
        <h1>СОДЕРЖАНИЕ</h1>
        <ol class="nav-list">
            <li><a href="#hobby">Мое хобби</a></li>
            <li><a href="#film">Мои любимые фильмы</a></li>
            <li><a href="#book">Мои любимые книги</a></li>
            <li><a href="#car">Мои любимые автомобили</a></li>
        </ol>
    </nav>
    <section class="main-box" id="hobby">
        <h2>Мое хобби</h2>
        Я увлекаюсь урбанистической исследовательской фотографией — это сочетание моей любви к фотографии и исследованию
        городских тайн. Меня всегда привлекали заброшенные здания, забытые фабрики, покинутые станции метро — места, где время,
        кажется, остановилось. В каждом таком месте я стараюсь увидеть не только разрушения, но и отголоски истории,
        архитектурную красоту и особую, немного меланхоличную атмосферу. Мои фотографии — это попытка запечатлеть эти моменты и
        поделиться ими с другими». Конечно, безопасность превыше всего, поэтому я всегда тщательно планирую свои «экспедиции» и
        соблюдаю все необходимые меры предосторожности. Если вам интересно взглянуть на город с другой стороны, загляните в мой
        фотоальбом, там вы найдёте несколько моих работ.
    </section>
    @foreach ($result as $category)
        <section class="main-box" id="{{ $category['key'] }}">
            <h2>{{ $category['title'] }}</h2>  
            <div class="items-grid">
                @foreach ($category['items'] as $item)
                    <div class="item-card">
                        @if ($category['key'] === 'film')
                            <img src="{{ asset($item['image']) }}" 
                                 alt="{{ $item['name'] }}"
                                 class="item-image item-image-film">
                        @elseif ($category['key'] === 'book')
                            <img src="{{ asset($item['image']) }}" 
                                 alt="{{ $item['name'] }}"
                                 class="item-image item-image-book">
                        @elseif ($category['key'] === 'car')
                            <img src="{{ asset($item['image']) }}" 
                                 alt="{{ $item['name'] }}"
                                 class="item-image item-image-car">
                        @endif
                        <h3>{{ $item['name'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
@endsection