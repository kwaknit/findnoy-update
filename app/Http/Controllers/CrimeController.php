<?php

namespace App\Http\Controllers;

use App\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = Crime::paginate();

        return response()->json($paginatedResult);
    }
}
