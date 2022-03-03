<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct() {
    }

    public function index (Request $request) {
        $questions = DB::table('questions')->latest()->paginate(5);

        return view('index', ['questions' => $questions]);
    }

}
