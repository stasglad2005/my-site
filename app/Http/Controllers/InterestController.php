<?php

namespace App\Http\Controllers;
use App\Models\Interest;

class InterestController{
    public function getInterest(){
        $result = Interest::getAll();
        return view('interests', compact('result'));
    }
}
