<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($surveyuuid)
    {
        $survey = Survey::where("uuid", "=", $surveyuuid)->first();
        $questions = $survey->questions()->where("isActive","=",true)->get();
        
        return view("question.index", compact("survey", "questions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($surveyuuid)
    {
        return view("question.create", compact("surveyuuid"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $surveyuuid)
    {
        try {
            $survey = Survey::where("uuid", "=", $surveyuuid)->first();
            $question = new Question();
            $question->question = $request->question;
            // dd($question->survey());
            $question->survey()->associate($surveyuuid);
            $question->save();
            return "success";
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view("question.edit", compact("question"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        try {
            $question->update([
                "question" => $request->question
            ]);
            return redirect(route("question.edit", $question))->with("success", "Successfuly edited!");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect(route("question.edit", $question))->with("error", "An Error Occured! Please Check The logs");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        try {
            foreach ($question->answers as $answer) {
                $answer->isActive = false;
                $answer->save();
            }
            $question->isActive = false;
            $question->save();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
