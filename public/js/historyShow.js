function displayHistory() {
    // Отображение текущего сеанса
    const sessionHistory = JSON.parse(sessionStorage.getItem('sessionHistory')) || {};
    const sessionTbody = $('#sessionHistory tbody');
    let sessionTotal = 0;
    // Очистка таблицы и заполнение данными текущего сеанса
    sessionTbody.empty();
    $.each(sessionHistory, function (page, count) {
        const row = `<tr><td>${page}</td><td>${count}</td></tr>`;
        sessionTbody.append(row);
        sessionTotal += count;
    });
    // Отображение истории за все время
    const allTimeHistory = getCookie('allTimeHistory') ? JSON.parse(getCookie('allTimeHistory')) : {};
    const allTimeTbody = $('#allTimeHistory tbody');
    let allTimeTotal = 0;
    // Очистка таблицы и заполнение данными за все время
    allTimeTbody.empty();
    $.each(allTimeHistory, function (page, count) {
        const row = `<tr><td>${page}</td><td>${count}</td></tr>`;
        allTimeTbody.append(row);
        allTimeTotal += count;
    });
    // Обновление общего количества посещений
    $('#historyNow').text(`Всего посещений за текущий сеанс: ${sessionTotal}.`); 
    $('#historyAll').text(`Всего посещений за все время: ${allTimeTotal}`);
}