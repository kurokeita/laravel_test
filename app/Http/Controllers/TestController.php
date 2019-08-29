<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\uploadRequest;
use Validator;
use DB;

class TestController extends Controller
{
    public function test() {
        echo "this is a test";
    }

    public function testCalling($id) {
        return $id;
    }
    public function testView($id, $name) {
        // return view('test', ['id' => $id, 'name' => $name]);
        $test = '<h1>abc</h1>';
        // return view('test', ['id' => $id, 'name' => $name, 'test' => $test]);
        return view('test', compact('id', 'name', 'test'));
    }
    public function getLogin() {
        return view('login');
    }

    /**
     * Create new validator rules + redirect back if fails
     *
     * @param Request $request
     * @return void
     */
    public function postLoginUseCustomValidator(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required | email',
            'name' => 'required | min : 5 | max : 25'
        ],[
            'id.required' => 'ID can not be blank',
            'name.required' => 'Name can not be blank',
            'id.numeric' => 'Must be a number',
            'name.min' => 'Name must be longer than 5 chars',
            'name.max' => 'Name must be shorter than 25 chars'
        ]);
        if($validator->fails()) {
            return redirect('test/login')->withErrors($validator)->withInput();
        } else {
            //
        }
    }

    public function postLoginUseFormRequest(LoginRequest $request) {
        $validated = $request->validated();
    }

    public function testArray() {
        $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 5, 3, 8];
        return view('testArray', compact('arr'));
    }

    public function viewDatabase() {
        $db = DB::table('test')->paginate(20);
        return view('viewDatabase', compact('db'));
    }

    public function setCookie() {
        $response = new response;
        $response->withCookie('test', 'laravel', 2, '/');
        return $response;
    }

    public function getCookie(Request $request) {
        echo $request->cookie('test');
    }

    public function getUploadFile() {
        return view('uploadFile');
    }

    public function postUploadFile(Request $request, uploadRequest $ulRequest) {
        $validated = $ulRequest->validated();
        if($request->hasFile('file')) {
            // $request->file('file')->move('../storage/files', $request->file('file')->getClientOriginalName());
            $request->file('file')->store('');
        } else echo 'nope';
    }
}
