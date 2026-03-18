$(document).ready( function(){
    dateShow();
});
function dateShow() {
    date = new Date();
    var day = date.toLocaleDateString('ru-RU', { weekday: 'long' });
    var time = date.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    var fullDate = date.toLocaleDateString('ru-RU', { day: '2-digit', month: '2-digit', year: 'numeric' });
    $('#date-time').html(`${time} ${fullDate}г. ${day}`);
    setTimeout('dateShow()', 1000);
}