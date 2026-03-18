<?php

namespace App\Http\Controllers;
use App\Models\Photo;

class PhotoAlbumController{
    public function index(){
        $photos = Photo::getAll();
        return view('photoalbom', compact('photos'));
    }
}