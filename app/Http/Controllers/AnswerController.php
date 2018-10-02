<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Survey;
use App\Answer;
use App\Http\Requests;


class AnswerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function store(Request $request, Survey $survey)
    {
        //$request->request->add(array('clave' =>12));
        //dd($request->all());
        // remove the token
        $arr = $request->except('_token');

        foreach ($arr as $key => $value) {
            foreach ($value as $answer) {
                foreach ($answer as $valor){
                    $newAnswer = new Answer();
                    $newAnswer->answer = $valor;
                    $newAnswer->question_id = $key;
                    $newAnswer->save();
                }
            }
        }


        /*foreach ($arr as $key => $value) {
            $newAnswer = new Answer();

            $newAnswer->answer = $value;
            $newAnswer->question_id = $key;
            $newAnswer->save();

            //$answerArray[] = $newAnswer;
        };*/
        return redirect()->action('SurveyController@view_survey_answers', [$survey->id]);
    }
}
