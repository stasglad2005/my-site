@extends('layout')

@section('title', 'История просмотра')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/history.css?v=' . filemtime(public_path('css/history.css'))) }}">
@endsection

@section('content')
    <section class="main">
        <h1>История просмотра страниц</h1>
        <div class="table-container">
            <section>
                <h2>История текущего сеанса</h2>
                <table id="sessionHistory">
                    <thead>
                        <tr>
                            <th>Страница</th>
                            <th>Количество посещений</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div id="historyNow" class="totalVisits" ></div>
            </section>
            <section>
                <h2>История за все время</h2>
                <table id="allTimeHistory">
                    <thead>
                        <tr>
                            <th>Страница</th>
                            <th>Количество посещений</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div id="historyAll" class="totalVisits"></div>
            </section>
        </div>
    </section>
@endsection 

@section('scripts')
        <script src="{{ asset('js/historyShow.js?v=' . filemtime(public_path('js/historyShow.js'))) }}" defer></script>
@endsection 