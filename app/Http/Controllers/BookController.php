<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookUser;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;

class BookController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function libros()
    {
        //$books = Book::with('checks')->orderBy('id', 'desc')->Paginate(6);
        //dd($books);
        $books = DB::table('books')
            ->distinct()
            ->leftJoin('book_user', 'book_user.book_id', '=', 'books.id')
            ->select('books.id', 'books.title', 'books.author', 'books.isbn', 'books.cover', 'books.link', 'book_user.check', 'books.created_at')
            ->paginate(6, ['books.id']);

        return view('book', compact('books'));
    }

    public function listBook()
    {
        $books = Book::orderBy('id', 'desc')->Paginate(3);
        return view('book.list', compact('books'));
    }

    public function checkBook(Request $request)
    {
        if($request->check > 0)
        {
            BookUser::where('book_id', $request->id)
                ->update([
                    'check'   => $request->input('check')+1,
                    'user_id'   => Auth::user()->id,
                    'book_id' => $request->input('id'),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);
        }else{
            DB::table('book_user')->insert(array(
                'check'   => $request->input('check')+1,
                'user_id'   => Auth::user()->id,
                'book_id' => $request->input('id'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ));
        }

        return redirect($request->link);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index');
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
        $file = $request->file('cover');
        $nameCover = $file->getClientOriginalName();
        $file->storeAs('book', $nameCover);

        DB::table('books')->insert([
            'title'      => $request->input('title'),
            'author'     => $request->input('author'),
            'isbn'       => $request->input('isbn'),
            'link'       => $request->input('link'),
            'cover'      => $file->storeAs('book', $nameCover),
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Session::flash('success', 'Se registró correctamente');

        return redirect()->back();
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
        //
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
        //
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

    public function chartBook()
    {
        $download = BookUser::sum('check');
        $month = BookUser::whereMonth('created_at','=', Carbon::now()->format('m'))->first();

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
            'title' => 'Libros visitados',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('book.chart');
    }

    public function detailBook(Request $request)
    {
        $downloads = BookUser::with(['book'])->where('book_id', $request->id)->get();
        //dd($downloads);
        //$month = InvestigationUser::whereMonth('created_at','=', Carbon::now()->format('m'))->first();

        $finances = \Lava::DataTable();

        $lava = new Lavacharts; // See note below for Laravel

        //$finances = $lava->DataTable();

        $finances->addStringColumn('')
            ->addNumberColumn('Descargas');

        foreach ($downloads as $download) {
            $finances->addRow([$download->created_at->format('F Y'), $download->check]);
            //$finances->addRow(['Otro', 100-$download]);
            //$finances->addRow(['Check Reviews', $download]);
            //$finances->addRow(['Settle Argument', 89]);
        }
        //dd($finances);
        foreach ($downloads as $download) {
            $title = $download->book->title;
        }

        \lava::ColumnChart('Finances', $finances, [
            'title' => isset($title) ? $title : '',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('book.chart-detail');
    }
}
