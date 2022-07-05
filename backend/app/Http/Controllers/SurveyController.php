<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view("survey.index", compact("surveys"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("survey.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Survey::create([
                'name' => $request->name
            ]);
            return redirect(route("survey.create"))->with("success", "Successfuly created!");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect(route("survey.create"))->with("error", "An Error Occured! Please Check The logs");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        try {
            $survey = Survey::where("uuid", "=", $uuid)->first();
            return view("survey.edit", compact("survey"));
        } catch (\Throwable $th) {
            return view("survey.edit", compact("survey"))->with("error", "An Error Occured! Please Check The logs");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $uuid)
    {
        try {
            $survey = Survey::where("uuid", "=", $uuid)->first();
            $survey->name = $request->name;
            $survey->save();
            return redirect(route("survey.edit", $survey->uuid))->with("success", "Successfuly edited!");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect(route("survey.edit", $uuid))->with("error", "An Error Occured! Please Check The logs");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
