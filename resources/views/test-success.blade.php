@extends('layout')

@section('title', 'Спасибо за ответ!')

@section('content')
    <section class="main-box">
        <h1>✅ Ответ отправлен!</h1>
        <div class="success-data">
            <p><strong>Имя:</strong> {{ $data['name'] }}</p>
            <p><strong>Группа:</strong> {{ $data['group'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>           
             <p><strong>Вопрос 1:</strong></p>
            <p class="message-text">{!! nl2br(e($data['question1'])) !!}</p>
            <p><strong>Вопрос 2:</strong></p>
            <p class="message-text">{!! nl2br(e($data['question2'])) !!}</p>
            <p><strong>Вопрос 3:</strong></p>
            <p class="message-text">{!! nl2br(e($data['question3'])) !!}</p>
            <p><strong>Результат:</strong></p>
            @php
                $grade = $data['results'];
                $gradeClass = '';
                if (strpos($grade, '(2)') !== false || strpos($grade, '(3)') !== false) {
                    $gradeClass = 'grade-poor';
                } elseif (strpos($grade, '(4)') !== false) {
                    $gradeClass = 'grade-good';
                } else {
                    $gradeClass = 'grade-excellent';
                }
            @endphp
            <p class="message-text grade-badge {{ $gradeClass }}">{{ $grade }}</p>        
            <p><small>Отправлено: {{ $data['timestamp'] }}</small></p>
        </div>
        <a href="{{ route('test.success') }}" class="btn-back">🔙 Вернуться</a>
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
            white-space: pre-wrap; /* Сохраняет переносы строк */
            word-wrap: break-word; /* Переносит длинные слова */
            overflow-wrap: break-word; /* Альтернатива word-wrap */
            max-width: 100%; /* Не выходит за пределы родителя */
            word-break: break-word; /* Разрывает слова при необходимости */
            hyphens: auto;
            font-size: 1.5em;
        }
        .grade-badge.grade-excellent {
            background: #e8f5e9;
            border-left-color: #4caf50;
            color: #2e7d32;
            font-weight: bold;
            font-size: 1.2em;
        }
        /* Хорошо (4) - синий */
        .grade-badge.grade-good {
            background: #e3f2fd;
            border-left-color: #2196f3;
            color: #1565c0;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Удовлетворительно (3) - оранжевый */
        .grade-badge.grade-poor {
            background: #fff3e0;
            border-left-color: #ffd000;
            color: #ffd000;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Неудовлетворительно (2) - красный */
        .grade-badge.grade-poor {
            background: #ffebee;
            border-left-color: #f44336;
            color: #c62828;
            font-weight: bold;
            font-size: 1.2em;
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