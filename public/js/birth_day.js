$(document).ready(function() {
    const $dobInput = $('#dob-input');
    const $calendar = $('#calendar');
    let currentYear;
    let currentMonth;
    $dobInput.on('click', showCalendar);
    function showCalendar() {
        $calendar.empty(); // Очищаем предыдущий календарь
        $calendar.css('display', 'block');
        // Извлекаем даты из поля ввода
        const dateValue = $dobInput.val();
        let dateParts = dateValue.split('.');
        // Устанавливаем год и месяц на основе введенной даты или текущей
        if (dateParts.length === 3) {
            const currentDay = parseInt(dateParts[0], 10);
            currentMonth = parseInt(dateParts[1], 10) - 1; // Месяцы в Date начинаются с 0
            currentYear = parseInt(dateParts[2], 10);
        } else {
            const date = new Date();
            currentYear = date.getFullYear();
            currentMonth = date.getMonth();
        }
        renderCalendar(currentYear, currentMonth);
    }
    function renderCalendar(year, month) {
        const monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
            "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
        const firstDay = new Date(year, month, 0);
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        let table = `<div class="calendar-header">
                        <button id="prev-month">«</button>
                        <button id="next-month">»</button>
                    </div>
                    <div class="month-name">${monthNames[month]} <select id="year-select"></select></div> 
                    <table>
                        <thead>
                            <tr>
                                <th class="th">Пн</th>
                                <th class="th">Вт</th>
                                <th class="th">Ср</th>
                                <th class="th">Чт</th>
                                <th class="th">Пт</th>
                                <th class="th">Сб</th>
                                <th class="th">Вс</th>
                            </tr>
                        </thead>
                        <tbody><tr>`;

        // Заполнение пустых дней в начале
        for (let i = 0; i < firstDay.getDay(); i++) {
            table += `<td></td>`;
        }
        // Добавление дней месяца
        for (let day = 1; day <= daysInMonth; day++) {
            table += `<td>${day}</td>`;
            if ((day + firstDay.getDay()) % 7 === 0) {
                table += `</tr><tr>`;
            }
        }
        table += `</tr></tbody></table>`;
        $calendar.html(table);
        // Добавляем обработчик для выбора даты
        $calendar.find('td').on('click', function() {
            const selectedDate = $(this).text();
            $dobInput.val(formatDate(`${selectedDate}.${month + 1}.${year}`)); // Формат даты
            $calendar.hide(); // Закрытие календаря
        });
        // Генерация списка годов
        const $yearSelect = $('#year-select');
        $yearSelect.empty();
        for (let i = 1900; i <= 2100; i++) {
            const $option = $('<option>').val(i).text(i);
            if (i === year) {
                $option.prop('selected', true);
            }
            $yearSelect.append($option);
        }
        $('#prev-month').on('click', function(event) {
            event.stopPropagation(); // Предотвращаем закрытие календаря
            changeMonth(-1);
        });
        $('#next-month').on('click', function(event) {
            event.stopPropagation(); // Предотвращаем закрытие календаря
            changeMonth(1);
        });
        $yearSelect.on('change', function(e) {
            currentYear = parseInt(e.target.value);
            renderCalendar(currentYear, currentMonth); // Перерисовываем календарь на выбранный год
        });
    }
    function changeMonth(delta) {
        currentMonth += delta;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        } else if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentYear, currentMonth);
    }
    function formatDate(dateString) {
        const parts = dateString.split('.');
        const day = String(parts[0]).padStart(2, '0'); // Добавляем ведущий ноль
        const month = String(parts[1]).padStart(2, '0'); // Добавляем ведущий ноль
        const year = parts[2];
        return `${day}.${month}.${year}`;
    }
    // Закрытие календаря на клик вне его
    $(document).on('click', function(event) {
        if (!$dobInput.is(event.target) && !$calendar.is(event.target) && $calendar.has(event.target).length === 0) {
            $calendar.hide();
        }
    });
});