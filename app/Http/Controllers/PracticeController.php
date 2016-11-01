<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PracticeController extends Controller
{
    
    public function example1() {
        return 'This is example 1';
    }

    public function example3() {
        echo \App::environment();
        echo 'App debug: '.config('app.debug');
    }
}
