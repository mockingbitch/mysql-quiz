<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\Student;
use App\Http\Requests\SQLRequest;


class HomeController extends Controller
{
    public function index()
    {
        return view('formsubmit');
    }

    public function submit(SQLRequest $request)
    {
        $data = [
            'name' => $request->name,
            'quiz_number' => $request->quiz_number,
            'answer' => $request->answer
        ];

        Answer::create($data);

        return redirect()->route('index')->with('msg', 'Submit thành công');
    }

    public function viewExecute()
    {
        return view('execute', [
            'students' => Student::all()
        ]);
    }

    public function execute(SQLRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'quiz_number' => $request->quiz_number,
                'answer' => $request->answer
            ];
            Answer::create($data);

            switch ($request->type) {
                case 'insert':
                    if (! $query = DB::insert($request->answer)) {
                        return redirect()->route('execute')->with('errMsg', 'Câu truy vấn không đúng');
                    }

                    break;
                case 'update':
                    if (! $query = DB::update($request->answer)) {
                        return redirect()->route('execute')->with('errMsg', 'Câu truy vấn không đúng');
                    }
                    break;
                case 'delete':
                    if (! $query = DB::delete($request->answer)) {
                        return redirect()->route('execute')->with('errMsg', 'Câu truy vấn không đúng');
                    }
                    break;
                default:
                    # code...
                    break;
            }

            return redirect()->route('execute')->with('msg', 'Submit thành công');
        } catch (\Throwable $th) {
            return redirect()->route('execute')->with('errMsg', 'Câu truy vấn không đúng');
        }
    }
}
