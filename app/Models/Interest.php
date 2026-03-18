<?php

namespace App\Models;

class Interest{
    private const CATEGORIES = [
        'film' => 'Фильмы', 
        'book' => 'Книги',
        'car' => 'Машины',
    ];
    private const ITEMS = [
        'film' => [
            ['name' => 'Джон Уик', 'description' => 'Американский остросюжетный боевик 2014 года.', 'image' => 'image/film1.jpg'],
            ['name' => 'Миссия невыполнима 3', 'description' => 'Американский шпионский боевик 2006 года', 'image' => 'image/film2.jpg'],
        ],
        'book' => [
            ['name' => 'HTML и CSS', 'description' => 'Руководство для изучения HTML и CSS с нуля для создания и стилизации веб-сайтов.', 'image' => 'image/book1.jpg'],
            ['name' => 'Си Шарп', 'description' => 'Книга знакомит читателей с написанием программного кода.', 'image' => 'image/book2.jpg'],
            ['name' => 'Java', 'description' => 'Практическое введение в программирование на Java, переработанное с учётом версии Java SE 17.', 'image' => 'image/book3.jpg'],
        ],
        'car' => [
            ['name' => 'Toyota Alteza', 'description' => 'Спортивный автомобиль бизнес-класса.', 'image' => 'image/car1.jpg'],
            ['name' => 'Toyota Mark 2', 'description' => 'Спортивный среднеразмерный седан.', 'image' => 'image/car2.jpg'],
            ['name' => 'Honda Civic', 'description' => 'Компактный автомобиль с поперечно расположенным двигателем.', 'image' => 'image/car3.jpg'],
        ],
    ];
    public static function getAll(){
        $result = [];
        foreach(self::CATEGORIES as $key => $title){
            $result[] = [
                'key' => $key,
                'title' => $title,
                'items' => self::ITEMS[$key],
            ];
        }
        return $result;
    }
}