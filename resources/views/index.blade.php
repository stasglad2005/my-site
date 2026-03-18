@extends('layout')

@section('title', 'Главная страница')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/body.css?v=' . filemtime(public_path('css/body.css'))) }}">
@endsection

@section('content')
    <section class="main-box">
        <div id="about">
            <div class="img-block">
                <img src="{{ asset('image/my_photo.jpg') }}" alt="Фотография Станислава">
            </div>
            <table>
                <caption>Гладков Станислав Сергеевич</caption>
                <tr>
                    <th>Группа:</th>
                    <td>ПИ/б-23-2-о</td>
                </tr>
                <tr>
                    <th>Номер телефона:</th>
                    <td>+79787777777</td>
                </tr>
            </table>
        </div>
    </section>
    <section class="main-box">
        <div id="lab">
            <h2>Информация о лабораторной работе</h2>
            <h3>Лабораторная работа №1.</h3>
            <h3>"Исследование возможностей языка разметки гипертекстов HTML и каскадных таблиц стилей CSS"</h3>
            <h3 class="target">Цель:</h3>
            <div class="text">
                Исследовать особенности структуры HTML-документа. Изучить
                основные понятия языка разметки гипертекстов HTML и каскадных таблиц
                стилей CSS. Приобрести практические навыки реализации Web-страниц c
                использованием гиперссылок, нумерованных и маркированных списков,
                графических элементов, таблиц и форм ввода.
            </div>
        </div>
    </section>
@endsection