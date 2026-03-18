@extends('layout')

@section('title', 'Спасибо за сообщение!')

@section('content')
    <section class="main-box">
        <h1>✅ Сообщение отправлено!</h1>  
        <div class="success-data">
            <p><strong>Имя:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Телефон:</strong> {{ $data['phone'] }}</p>
            <p><strong>Сообщение:</strong></p>
            <p class="message-text">{!! nl2br(e($data['message'])) !!}</p>
            <p><small>Отправлено: {{ $data['timestamp'] }}</small></p>
        </div>
        
        <a href="{{ route('contact.show') }}" class="btn-back">← Вернуться</a>
    </section>
@endsection

@section('styles')
    <style>
        .main-box{
            max-width: 30%;
            margin: 0 auto;
            padding: 20px;
            padding-right: 50px;
            background-color: #a8a7a750;
            border-radius: 10px;
            margin-top: 30px;
        }
        .success-data {
            background: #f0f9f0;
            border: 1px solid #4caf50;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            max-width: 100%;
            overflow: hidden;
            width: 20vw;
        }    
        .success-data p {
            margin: 10px 0;
            color: #333;
            font-size: 1.2em;
        } 
        .message-text {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #4caf50;
            white-space: pre-wrap;
            word-wrap: break-word; 
            overflow-wrap: break-word;
            max-width: 100%; 
            word-break: break-word; 
            hyphens: auto;
            font-size: 1.5em;
        }     
        .btn-back {
            display: inline-block;
            background: #3498db;
            color: #fff;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }     
        .btn-back:hover {
            background: #2980b9;
        }
    </style>
@endsection