<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($questionuuid)
    {
        return view("answer.create",compact("questionuuid"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$questionuuid)
    {
        try {
            $question = Question::where("uuid", "=", $questionuuid)->first();
            $answer = new Answer();
            $answer->answer = $request->answer;
            // dd($question->survey());
            $answer->question()->associate($questionuuid);
            $answer->save();
            return redirect(route("answer.create",compact("questionuuid")))->with("success","Answer is created successfully!");
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            return redirect(route("answer.create",compact("questionuuid")))->with("error","An error occured! Please check the logs!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        return view("answer.edit",compact("answer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        try {
            $answer->update([
                "answer" => $request->answer
            ]);
            return redirect(route("answers.edit", $answer))->with("success", "Successfuly edited!");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect(route("answers.edit", $answer))->with("error", "An Error Occured! Please Check The logs");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
