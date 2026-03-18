function changeIcon(fileImg) {
    var fileName = fileImg.slice(0, -4);   
    $(`#img-${fileName}`).attr('src', `/image/${fileImg}`);
}
function resetIcon(nameImg) {
    $(`#img-${nameImg}`).attr('src', `/image/default.png`);
}
function getCookie(name) {
    const value = `;${document.cookie}`;
    const parts = value.split(`;${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
function setCookie(name, value, expiration_days) {
    const d = new Date();
    d.setTime(d.getTime() + (expiration_days * 24 * 60 * 60 * 1000));
    const expires = `; expires=${d.toUTCString()}`;
    document.cookie = `${name}=${value}${expires}`;
}
function trackPageView(pageName) {
    // Обновляем информацию о текущем сеансе в sessionStorage
    const sessionHistory = JSON.parse(sessionStorage.getItem('sessionHistory')) || {};
    sessionHistory[pageName] = (sessionHistory[pageName] || 0) + 1;
    sessionStorage.setItem('sessionHistory', JSON.stringify(sessionHistory));
    // Обновляем информацию о всем времени в Cookies
    const allTimeHistory = getCookie('allTimeHistory') ? JSON.parse(getCookie('allTimeHistory')) : {};
    allTimeHistory[pageName] = (allTimeHistory[pageName] || 0) + 1;
    setCookie('allTimeHistory', JSON.stringify(allTimeHistory), 365); // Устанавливаем на 1 год
}
// Вызов функции отслеживания при загрузке страницы
$(document).ready(function () {
    const pageName = document.title; // Или любое другое уникальное имя страницы
    trackPageView(pageName);
    if (pageName === 'История просмотра'){
        displayHistory();
    }
});
$(document).ready(function () {
    var hoverTimeout; // Таймер для задержки исчезновения 
    var currentPopoverId;

    $('.form-data input, .form-data select').hover(function (event) {
        // Находим соответствующий popover и показываем его 
        currentPopoverId = $(this).attr('id') + '-popover';
        $('#' + currentPopoverId).css({
            top: $(this).offset().top + $(this).outerHeight() + 5, // 5 пикселей ниже элемента
            left: $(this).offset().left // С выравниванием по левому краю элемента
        }).fadeIn(200);
        clearTimeout(hoverTimeout);
    }, function () {
        // Задержка перед исчезновением popover 
        hoverTimeout = setTimeout(function () {
            $('#' + currentPopoverId).fadeOut(200); // Скрытие popover 
        }, 10);
    });
    $('.form-data input, .form-data select').focus(function () {
        // Скрываем popover при получении фокуса
        if (currentPopoverId) {
            $('#' + currentPopoverId).fadeOut(200);
        }
    });
});