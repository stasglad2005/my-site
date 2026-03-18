const fotos = window.photoData?.fotos || [];
const titles = window.photoData?.titles || [];

let currentIndex = 0;

function showImage(index) {
    //if (!fotos[index]) return;
    $('#large-image').attr('src', fotos[index]);
    $('#large-image').attr('alt', titles[index]);
    $('#image-title').text(titles[index]);
    $('#image-number').text(`Изображение ${index + 1} из ${fotos.length}`);
    currentIndex = index;
}

$('.small-photo').on('click', function () {
    var currentIndex = $(this).data('index');
    showImage(currentIndex);
    $('#large-image-container').css('display', 'flex');
    $('#large-image-container').fadeIn();
    $('#overlay').fadeIn();
});

$('#close-btn, #overlay').on('click', function () { 
    $('#large-image-container').fadeOut(); 
    $('#overlay').fadeOut(); 
}); 
$('#prev-btn').on('click', function () { 
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : fotos.length - 1; // Переход к предыдущему изображению 
    showImage(currentIndex); 
}); 
$('#next-btn').on('click', function () { 
    currentIndex = (currentIndex < fotos.length - 1) ? currentIndex + 1 : 0; // Переход к следующему изображению 
    showImage(currentIndex); 
});