<?php

namespace App\Models;

class Photo {
    private const FOTOS = [
        'image/car1.jpg', 'image/car2.jpg', 'image/cat.jpg', 
        'image/book1.jpg', 'image/cat.jpg', 'image/book3.jpg', 
        'image/film1.jpg', 'image/film2.jpg', 'image/cat.jpg', 
        'image/car3.jpg', 'image/cat.jpg', 'image/book2.jpg', 
        'image/cat.jpg', 'image/car2.jpg', 'image/cat.jpg'
    ]; 
    private const TITLES = [
        'Барсик', 'Шарик', 'Птица', 'Рыба', 'Хомяк', 
        'Кролик', 'Черепаха', 'Змея', 'Фретка', 'Мышь', 
        'Пушок', 'Снежок', 'Дымок', 'Попугай', 'Тигр'
    ];
    public static function getAll(){
        $photos = [];
        for ($i = 0; $i < count(self::FOTOS); $i++){
            $photos[] = [
                'src' => self::FOTOS[$i],
                'title' => self::TITLES[$i],
            ];
        }
        return $photos;
    }
}