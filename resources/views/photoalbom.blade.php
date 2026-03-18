@extends('layout')

@section('title', 'Фотоальбом')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/photoalbom.css?v=' . filemtime(public_path('css/photoalbom.css'))) }}">
    <script>
        window.photoData = {
            fotos: @json(array_column($photos, 'src')),
            titles: @json(array_column($photos, 'title'))
        };
    </script>
@endsection

@section('content')
    <section class="main-box">
        <div>
            <table id="photo-table">
                @for ($i = 0; $i < count($photos); $i++)
                    @if ($i % 3 == 0)
                        @if ($i !== 0)
                            </tr>
                        @endif
                        <tr>
                    @endif
                    <td>
                        <img src="{{ asset($photos[$i]['src']) }}" alt="{{ $photos[$i]['title'] }}" title="{{ $photos[$i]['title'] }}" class="small-photo" data-index="{{ $i }}">
                        <div class="name">{{ $photos[$i]['title'] }}</div>
                    </td>
                @endfor
                </tr>
            </table>
        </div>
        <div id="large-image-container">
            <button id="close-btn">&times;</button>
            <div id="image-number"></div>
            <button id="prev-btn" class="nav-btn">&#10094;</button>
            <img id="large-image" src="" alt="" />
            <button id="next-btn" class="nav-btn">&#10095;</button>
            <div id="image-title"></div>
        </div>
        <div id="overlay">
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/photo.js?v=' . filemtime(public_path('js/photo.js'))) }}"></script>
@endsection
