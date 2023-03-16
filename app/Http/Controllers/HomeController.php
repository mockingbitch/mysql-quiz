<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;

class HomeController extends Controller
{
    public function index()
    {
        return view('formsubmit');
    }

    public function submit(Request $request)
    {
        $data = [
            'name' => $request->name,
            'quiz_number' => $request->quiz_number,
            'answer' => $request->answer
        ];

        Answer::create($data);

        return redirect()->route('index')->with('msg', 'Submit thành công');
    }
}
