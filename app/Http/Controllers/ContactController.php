<?php

namespace App\Http\Controllers;

use App\Validators\FormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validator = new FormValidation();

        // Добавляем правила для каждого поля
        $validator->SetRule('name', 'isNotEmpty');
        $validator->SetRule('email', 'isNotEmpty');
        $validator->SetRule('email', 'isEmail');      
        $validator->SetRule('phone', 'isNotEmpty');
        $validator->SetRule('message', 'isNotEmpty');

        $postData = $request->all();

        if (!$validator->Validate($postData)) {
            return back()
                ->withErrors($validator->getErrors())
                ->withInput();
        }
        Session::put('contact_data', [
            'name' => $postData['name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'] ?? 'Не указан',
            'message' => $postData['message'],
            'timestamp' => date('d.m.Y H:i')
        ]);
        return redirect()->route('contact.success');
    }

    public function success()
    {
        $data = Session::get('contact_data');
        if (!$data) {
            return redirect()->route('contact.show');
        }
        Session::forget('contact_data');
        return view('contact-success', compact('data'));
    }
}