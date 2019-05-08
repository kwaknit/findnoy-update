<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function import(Request $request) {
        $this->validate($request, [
            'file' => 'required|mimes:csv,txt'
        ]);
    }
}
