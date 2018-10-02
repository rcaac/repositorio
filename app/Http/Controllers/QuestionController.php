<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Question;
use Auth;
use App\Valuation;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function newQuestion($question)
    {
        $id = $question;
        $valuation = Valuation::pluck('valuation', 'id');
        $valuation->prepend('Seleccione una valoración para la encuesta');
        return view('question.new', compact('id', 'valuation'));
    }
  
    public function store(Request $request, Survey $survey) 
    {
        //dd($request->all());
      //$arr = $request->all();
      //$arr['user_id'] = Auth::id();
      //$survey->questions()->create($arr);
      $question = new  Question();
      $question->title = $request->title;
      $question->question_type = $request->question_type;
      $question->option_name = $request->option_name;
      $question->survey_id = $request->survey_id;
      $question->valuation_id = $request->valuation_id;

      $question->save();

      return back();
    }

    public function edit(Question $question) 
    {
      return view('question.edit', compact('question'));
    }

    public function update(Request $request, Question $question) 
    {
        //dd($request->all());
      $question->update($request->all());
      return redirect()->action('SurveyController@detail_survey', [$question->survey_id]);
    }

}
