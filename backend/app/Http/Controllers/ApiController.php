<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function surveys()
    {
        return response()->json(Survey::where("isActive", "=", true)->get(["name","uuid","created_at"]));
    }

    public function survey($uuid)
    {
        $survey = Survey::where("uuid","=",$uuid)->first();
        if ($survey == null) return response()->json(["message" => "questionare does not exist!"],404);
        
        // return response()->json($survey->questions()->with(["answers" => function($query){
        //     $query->where("isActive","=",true)->get(["answer"]);
        // }])->where("isActive","=",true)->get());
        return response()->json($survey->questions()->with(["answers" => function($query){
            $query->where("isActive","=",true)->get(["answer"]);
        }])->where("isActive","=",true)->get());
    }
}
