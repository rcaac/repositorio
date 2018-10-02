<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use App\Answer;
use MongoDB\Driver\Query;

class ReportSurveyController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showChart($id)
    {

        $answers = DB::table('valuations')
            ->select('valuations.valuation', DB::raw( 'AVG( answers.answer ) as answer' ))
            ->join('questions', 'valuations.id', '=', 'questions.valuation_id')
            ->join('surveys', 'surveys.id', '=', 'questions.survey_id')
            ->join('answers', 'answers.question_id', '=', 'questions.id')
            ->groupBy('valuation')
            ->where('questions.survey_id', '=', $id)
            ->get();

        //dd($answers);

        $finances = \Lava::DataTable();

        $finances->addStringColumn('')
            ->addNumberColumn('Encuestas');

        foreach ($answers as $answer) {
            $finances->addRow([$answer->valuation, $answer->answer]);

            \lava::ColumnChart('Finances', $finances, [
                'title' => 'Resultado por categoría',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
        }

        //return View('charts', compact('id'))->with('Finances', $finances);
        return View('charts', compact('finances', 'id'));

    }

    public function questionCharts($id)
    {
         $answers = DB::table('questions')
            ->select('answers.answer', 'surveys.title as encuesta', 'questions.title', DB::raw( 'AVG( answers.answer ) as ans' ))
            ->join('answers', 'answers.question_id', '=', 'questions.id')
            ->join('surveys', 'surveys.id', '=', 'questions.survey_id')
            ->groupBy('questions.title')
             ->where('surveys.id', '=', $id)
            ->get();

        $question = \Lava::DataTable();

        $question->addStringColumn('')
            ->addNumberColumn('Encuestas');
        foreach ($answers as $answer) {
            $question->addRow([$answer->title, $answer->ans]);

            \lava::BarChart('Question', $question, [
                'title' => $answer->encuesta,
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
        }

        return View('charts_questions')->with('Question', $question);
    }

}
