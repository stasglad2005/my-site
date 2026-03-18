@extends('layout')

@section('title', 'Тест')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/test.css?v=' . filemtime(public_path('css/test.css'))) }}">
@endsection

@section('content')
    <section class="main-box">
        <header>
            <h1>Тест по дисциплине «Теория вероятностей и математическая статистика»</h1>
        </header>
        <form method="POST" action="{{ route('test.submit') }}">
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
                <label for="group">Группа<span>*</span></label>
                <select id="group" name="group">
                    <option value="">Выберите группу</option>
                    <optgroup label="1 курс">
                        <option value="ИИ/б-25-1-о" {{ old('group') == 'ИИ/б-25-1-о' ? 'selected' : '' }}>ИИ/б-25-1-о</option>
                        <option value="ИИ/б-25-2-о" {{ old('group') == 'ИИ/б-25-2-о' ? 'selected' : '' }}>ИИ/б-25-2-о</option>
                    </optgroup>
                    <optgroup label="2 курс">
                        <option value="ИИ/б-24-1-о" {{ old('group') == 'ИИ/б-24-1-о' ? 'selected' : '' }}>ИИ/б-24-1-о</option>
                        <option value="ИИ/б-24-2-о" {{ old('group') == 'ИИ/б-24-2-о' ? 'selected' : '' }}>ИИ/б-24-2-о</option>
                    </optgroup>
                    <optgroup label="3 курс">
                        <option value="ИВТ/б-23-1-о" {{ old('group') == 'ИВТ/б-23-1-о' ? 'selected' : '' }}>ИВТ/б-23-1-о</option>
                        <option value="ИС/б-23-1-о" {{ old('group') == 'ИС/б-23-1-о' ? 'selected' : '' }}>ИС/б-23-1-о</option>
                        <option value="ПИ/б-23-1-о" {{ old('group') == 'ПИ/б-23-1-о' ? 'selected' : '' }}>ПИ/б-23-1-о</option>
                        <option value="ПИН/б-23-1-о" {{ old('group') == 'ПИН/б-23-1-о' ? 'selected' : '' }}>ПИН/б-23-1-о</option>
                    </optgroup>
                    <optgroup label="4 курс">
                        <option value="ИВТ/б-22-1-о" {{ old('group') == 'ИВТ/б-22-1-о' ? 'selected' : '' }}>ИВТ/б-22-1-о</option>
                        <option value="ИС/б-22-1-о" {{ old('group') == 'ИС/б-22-1-о' ? 'selected' : '' }}>ИС/б-22-1-о</option>
                        <option value="ПИ/б-22-1-о" {{ old('group') == 'ПИ/б-22-1-о' ? 'selected' : '' }}>ПИ/б-22-1-о</option>
                        <option value="ПИН/б-22-1-о" {{ old('group') == 'ПИН/б-22-1-о' ? 'selected' : '' }}>ПИН/б-22-1-о</option>
                    </optgroup>
                </select>
                @error('group')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="popover" id="group-popover">Выберите вашу группу из списка.</div>
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
                <label for="question1">1. В классе 30 учеников, из них 12 — девочки. 
                    Один ученик вызывается к доске случайным образом. Найдите вероятность того, что это будет мальчик.</label><br>
                <textarea id="question1" name="question1" rows="5">{{ old('question1') }}</textarea>
                @error('question1')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-data">
                <label>2. В группе 8 девушек и 6 юношей. Их разделили на две равные подгруппы. Сколько исходов благоприятствуют событию: все юноши
                окажутся в одной подгруппе?</label><br>
                <input type="radio" id="radio1" name="question2" value="8" {{ old('question2') == '8' ? 'checked' : '' }}><label for="radio1">8</label><br>
                <input type="radio" id="radio2" name="question2" value="168" {{ old('question2') == '168' ? 'checked' : '' }}><label for="radio2">168</label><br>
                <input type="radio" id="radio3" name="question2" value="840" {{ old('question2') == '840' ? 'checked' : '' }}><label for="radio3">840</label><br>
                <input type="radio" id="radio4" name="question2" value="56" {{ old('question2') == '56' ? 'checked' : '' }}><label for="radio4">56</label>
                @error('question2')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-data">
                <label>3. Какое из утверждений относительно генеральной и выборочной совокупностей является верным?</label><br>
                <select name="question3">
                    <option value="">Выберите правильный ответ</option>
                    <option value="выборочная совокупность – часть генеральной" {{ old('question3') == 'выборочная совокупность – часть генеральной' ? 'selected' : '' }}>выборочная совокупность – часть генеральной</option>
                    <option value="генеральная совокупность – часть выборочной" {{ old('question3') == 'генеральная совокупность – часть выборочной' ? 'selected' : '' }}>генеральная совокупность – часть выборочной</option>
                </select>
                @error('question3')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="submit-btn">Отправить тест</button>
                <button type="reset" class="reset-btn">Очистить форму</button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/contactTest.js?v=' . filemtime(public_path('js/contactTest.js'))) }}"></script>
@endsection