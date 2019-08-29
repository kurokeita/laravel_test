<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_validation extends Controller
{
    public function login_validate(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required | numeric',
            'name' => 'required | min : 5 | max : 25'
        ],[
            'id.required' => 'ID can not be blank',
            'name.required' => 'Name can not be blank',
            'id.numeric' => 'Must be a number',
            'name.min' => 'Name must be longer than 5 chars',
            'name.max' => 'Name must be shorter than 25 chars'
        ]);
        if($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput;
        }
    }
}
