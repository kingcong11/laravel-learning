<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function home(){

        $data = [
            'tasks' => [
                'task 1',
                'task 2',
                'task 3',
                'task 4'
            ],
            'foo' => 'foobar'
        ];

        return view('welcome', $data);

    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }


}
