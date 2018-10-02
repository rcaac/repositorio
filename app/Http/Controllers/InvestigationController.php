<?php

namespace App\Http\Controllers;

use App\Investigation;
use App\InvestigationUser;
use App\State;
use App\Subject;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class InvestigationController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listInvestigation()
    {
        $investigations = Investigation::with('downloads')->paginate(4);
        return view('research.list', compact('investigations'));
    }

    public function showInvestigation(Investigation $investigation)
    {
        $download = DB::table('investigation_user')
            ->select('download')
            ->where('investigation_id', '=', $investigation->id)
            ->first();

        return view('investigation-detail', compact('investigation', 'download'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = State::pluck('state', 'id');
        $status->prepend('Selecciona el estado de la investigación');

        $subjects = Subject::pluck('subject', 'id');
        $subjects->prepend('Selecciona el tema de investigación');

        $investigations = Investigation::all();

        return view('research.index', compact('status', 'subjects', 'investigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$archive = $request->file('file');
        $nameFile = $archive->getClientOriginalName();
        $archive->storeAs('public/file', $nameFile);

        $file = $request->file('cover');
        $nameCover = $file->getClientOriginalName();
        $file->storeAs('public/cover', $nameCover);*/

        DB::table('investigations')->insert([
            'title'   => $request->input('title'),
            'summary'   => $request->input('summary'),
            'url' => str_slug($request->input('title')),
            'page'   => $request->input('page'),
            'dimension'   => $request->input('dimension'),
            'size'   => $request->input('size'),
            'state_id'   => $request->input('state'),
            'user_id' => $request->input('user_id'),
            'subject_id' => $request->input('subject'),
            'file' => $request->file('file')->store('file', 'public'),
            'cover' => $request->file('cover')->store('cover', 'public'),
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Session::flash('success', 'Se registró correctamente');

        return redirect()->back();
    }

    public function downloadEvidences(Request $request)
    {
        if($request->download > 0)
        {
            InvestigationUser::where('investigation_id', $request->id)
                ->update([
                    'download'   => $request->input('download')+1,
                    'user_id'   => Auth::user()->id,
                    'investigation_id' => $request->input('id') ,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                ]);
        }else{
            DB::table('investigation_user')->insert(array(
                'download'   => $request->input('download')+1,
                'user_id'   => Auth::user()->id,
                'investigation_id' => $request->input('id') ,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ));
        }


        $headers = [];
        return response()->download(storage_path('app/public/'.$request->file), null, $headers, 'inline');
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
    public function edit($id)
    {
        $status = State::pluck('state', 'id');
        $subjects = Subject::pluck('subject', 'id');
        $investigation= Investigation::findOrFail($id);

        return view('research.edit', compact('investigation', 'status', 'subjects'));
        /*$investigation = Investigation::findOrFail($id);
        return response()->json($investigation );*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $investigation = Investigation::findOrFail($id);
        $investigation->fill($request->all());

        if ($request->hasFile('file'))
        {
            $investigation->file = $request->file('file')->store('file', 'public');
        }
        if ($request->hasFile('cover'))
        {
            $investigation->cover = $request->file('cover')->store('cover', 'public');
        }

        $investigation->save();


        return back();
        //return response()->json($investigation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $investigation = Investigation::findOrFail($id);

        Storage::delete('public/'.$investigation->file);
        Storage::delete('public/'.$investigation->cover);

        $investigation->delete();

        return response()->json(['done']);
    }

    public function investigaciones()
    {
        $investigations = Investigation::paginate(3);
        return view('investigation', compact('investigations'));
    }

    public function chartInvestigation()
    {
        $download = InvestigationUser::sum('download');
        $month = InvestigationUser::whereMonth('created_at','=', Carbon::now()->format('m'))->first();

        $finances = \Lava::DataTable();

        $lava = new Lavacharts; // See note below for Laravel

        //$finances = $lava->DataTable();

        $finances->addStringColumn('')
            ->addNumberColumn('Descargas');

        //foreach ($answers as $answer) {
            $finances->addRow(['Descargas a '.$month->created_at->format('F Y'), $download]);
            //$finances->addRow(['Otro', 100-$download]);
        //$finances->addRow(['Check Reviews', $download]);
        //$finances->addRow(['Settle Argument', 89]);
        //}

        \lava::ColumnChart('Finances', $finances, [
            'title' => 'Descargas de investigaciones',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('research.chart');
    }

    public function detailInvestigation(Request $request)
    {
        $downloads = InvestigationUser::with(['investigation'])->where('investigation_id', $request->id)->get();
        //dd($downloads);
        //$month = InvestigationUser::whereMonth('created_at','=', Carbon::now()->format('m'))->first();

        $finances = \Lava::DataTable();

        $lava = new Lavacharts; // See note below for Laravel

        //$finances = $lava->DataTable();

        $finances->addStringColumn('')
            ->addNumberColumn('Descargas');

        foreach ($downloads as $download) {
        $finances->addRow([$download->created_at->format('F Y'), $download->download]);
        //$finances->addRow(['Otro', 100-$download]);
        //$finances->addRow(['Check Reviews', $download]);
        //$finances->addRow(['Settle Argument', 89]);
        }
        //dd($finances);
        foreach ($downloads as $download) {
           $title = $download->investigation->title;
        }

        \lava::ColumnChart('Finances', $finances, [
            'title' => isset($title) ? $title : '',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('research.chart-detail');
    }
}
