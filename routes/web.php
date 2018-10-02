<?php


Route::get('/', function () {
    return view('start');
});
Route::get('administration', function () {
    return view('admin');
});

//Login
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('view.out');

//Valuations
Route::resource('valuation', 'ValuationController');
Route::get('listValuation', 'ValuationController@listValuation');

//Investigations
Route::resource('investigation', 'InvestigationController');
Route::get('listInvestigation/{page?}', 'InvestigationController@listInvestigation');
Route::get('showInvestigation/{investigation}', 'InvestigationController@showInvestigation');
Route::get('downloadEvidences', 'InvestigationController@downloadEvidences');
Route::get('investigaciones', 'InvestigationController@investigaciones');
Route::get('chartInvestigation', 'InvestigationController@chartInvestigation')->name('investigation.chart');
Route::get('detailInvestigation/{id}', 'InvestigationController@detailInvestigation')->name('investigation.detail');

//Books
Route::resource('books', 'BookController');
Route::get('listBook/{page?}', 'BookController@listBook');
Route::get('checkBook', 'BookController@checkBook');
Route::get('libros', 'BookController@libros');
Route::get('chartBook', 'BookController@chartBook')->name('book.chart');
Route::get('detailBook/{id}', 'BookController@detailBook')->name('book.detail');

//Users
Route::resource('user', 'UserController');
Route::get('user/{id}/edit', 'UserController@edit');
Route::get('listUser/{page?}', 'UserController@listUser');
Route::get('searchUser/{page?}', 'UserController@searchUser');

//Selects
Route::get('select/category', 'SelectController@category');
Route::get('select/position', 'SelectController@position');
Route::get('select/subject', 'SelectController@subject');
Route::get('select/role', 'SelectController@role');

Route::get('select/status', 'SelectController@status');
Route::get('select/theme', 'SelectController@theme');


//Encuestas
Route::get('survey', 'SurveyController@survey')->name('survey')->middleware('auth');
Route::get('listSurvey', 'SurveyController@listSurvey')->name('list.survey');

Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');
Route::get('/survey/{survey}', 'SurveyController@detail_survey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');

Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');

// Questions related
Route::post('questions', 'QuestionController@store')->name('store.question');

Route::get('/question/{question}/newQuestion', 'QuestionController@newQuestion')->name('new.question');
Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
//Route::auth();

Route::get('encuestas', 'SurveyController@encuesta')->name('home.encuestas');
Route::get('encuestas/{survey}', 'SurveyController@view_home')->name('view.encuestas');;

//Charts
Route::get('charts/{id}', 'ReportSurveyController@showChart')->name('view.charts');
Route::get('questionCharts/{id}', 'ReportSurveyController@questionCharts')->name('view.questionCharts');

