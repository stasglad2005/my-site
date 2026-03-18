@extends('layout')

@section('title', 'Контакты')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css?v=' . filemtime(public_path('css/contact.css'))) }}">
@endsection

@section('content')
    <section class="main-box">
        <header>
            <h1>Мои контакты</h1>
        </header>
        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf
            <div class="form-data">
                <label for="fullname">ФИО</label><span>*</span>
                <input id="fullname" type="text" name="name" placeholder="Введите ФИО" value="{{ old('name') }}">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="popover" id="fullname-popover">Введите полное имя в формате: Фамилия Имя Отчество.</div>
            </div>
            <div class="form-data">
                <label>Пол<span>*</span></label><br>
                <input type="radio" id="man" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                <label for="man">Мужской</label>
                <input type="radio" id="woman" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                <label for="woman">Женский</label>
            </div>
            <div class="form-data">
                <label for="dob-input">Дата рождения<span>*</span></label>
                <input id="dob-input" type="text" name="birth_date" readonly placeholder="Выберите дату" value="{{ old('birth_date') }}">
                <div id="calendar" class="calendar"></div>
            </div>
            <div class="form-data">
                <label for="age">Возраст</label>
                <select id="age" name="age">
                    <option value="">Выберите возраст</option>
                    <option value="18-20" {{ old('age') == '18-20' ? 'selected' : '' }}>18–20 лет</option>
                    <option value="20-25" {{ old('age') == '20-25' ? 'selected' : '' }}>20–25 лет</option>
                    <option value="25-30" {{ old('age') == '25-30' ? 'selected' : '' }}>25–30 лет</option>
                    <option value="30-35" {{ old('age') == '30-35' ? 'selected' : '' }}>30–35 лет</option>
                    <option value="35-40" {{ old('age') == '35-40' ? 'selected' : '' }}>35–40 лет</option>
                    <option value="40-45" {{ old('age') == '40-45' ? 'selected' : '' }}>40–45 лет</option>
                    <option value="45-50" {{ old('age') == '45-50' ? 'selected' : '' }}>45–50 лет</option>
                    <option value="50+" {{ old('age') == '50+' ? 'selected' : '' }}>50+ лет</option>
                </select>
            </div>
            <div class="form-data">
                <label for="email">Email</label><span>*</span>
                <input type="text" id="email" name="email" placeholder="Введите email" value="{{ old('email') }}">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="popover" id="email-popover">Введите вашу почту в формате: username@example.com</div>
            </div>
            <div class="form-data">
                <label for="phone">Телефон</label><span>*</span>
                <input type="text" id="phone" name="phone" placeholder="Введите номер телефона" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="popover" id="phone-popover">Введите номер телефона в формате: +7978XXXXXXX</div>
            </div>
            <div class="form-data">
                <label for="sms">Сообщение</label><span>*</span><br>
                <textarea id="sms" name="message" rows="5">{{ old('message') }}</textarea>
                @error('message')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="submit-btn">Отправить</button>
                <button type="reset" class="reset-btn">Очистить форму</button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script src = "{{ asset('js/contactTest.js?v='  . filemtime(public_path('js/contactTest.js'))) }}"></script>
    <script src="{{ asset('js/birth_day.js?v='  . filemtime(public_path('js/birth_day.js'))) }}"></script>
@endsection
