<?php

namespace App\Http\Controllers;

use App\Validators\CustomFormValidation;
use App\Validators\ResultsVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller{
    public function showForm()
    {
        return view('test');
    }

    public function submit(Request $request){
        $validator = new CustomFormValidation();

        $validator->SetRule('name', 'isNotEmpty');
        $validator->SetRule('name', 'isStudentName');
        $validator->SetRule('group', 'isGroupSelected');
        $validator->SetRule('email', 'isNotEmpty');
        $validator->SetRule('email', 'isEmail');
        $validator->SetRule('question1', 'isAnswerNotEmpty');
        $validator->SetRule('question1', 'isAnswerMinLength', 2);
        $validator->SetRule('question1', 'isAnswerMaxLength', 25);
        $validator->SetRule('question2', 'isAnswerSelected');
        $validator->SetRule('question3', 'isAnswerSelected');

        $postData = $request->all();

        if (!$validator->Validate($postData)) {
            return back()
                ->withErrors($validator->getErrors())
                ->withInput();
        }

        $resultsChecker = new ResultsVerification();
        $testResults = $resultsChecker->VerifyTestResults($postData);

        Session::put('test_data', [
            'name' => $postData['name'],
            'email' => $postData['email'],
            'group' => $postData['group'],
            'question1' => $postData['question1'],
            'question2' => $postData['question2'],
            'question3' => $postData['question3'],
            'results' => $testResults,
            'timestamp' => date('d.m.Y H:i')
        ]);
        return redirect()->route('test.success');
    }
    public function success()
    {
        $data = Session::get('test_data');
        if (!$data) {
            return redirect()->route('test.show');
        }
        Session::forget('test_data');
        return view('test-success', compact('data'));
    }
}