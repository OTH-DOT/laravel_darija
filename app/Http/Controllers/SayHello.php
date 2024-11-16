<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SayHello extends Controller
{
    public function index(Request $request) {
        return view('welcome', [
            'nom' => null,
            'prenom' => 'makkour',
            'languages' => ['js','pytho','php'],
            'color' => '',
            'n1' => 15,
            'n2' => 10,
        ]);
    }
}
