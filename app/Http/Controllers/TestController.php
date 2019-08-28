<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function postLogin(Request $request) {
        echo $request->id.' '.$request->name;
    }
    public function testArray() {
        $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 5, 3, 8];
        return view('testArray', compact('arr'));
    }
}
