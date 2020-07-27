<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Data\Word5;
use App\Model\Data\Word7;

class HomeController extends Controller
{
    public function index()
    {
        $word5 = Word5::inRandomOrder()->take(7)->get();
        $word7 = Word7::inRandomOrder()->take(3)->get();
        $message = '闇の闘技場';

        return view('home.index', ['message' => $message, 'word5' => $word5, 'word7' => $word7]);
    }

    public function list() {
        $word5 = Word5::get();
        $word7 = Word7::get();

        return view('home.list', ['word5' => $word5, 'word7' => $word7]);
    }
}
