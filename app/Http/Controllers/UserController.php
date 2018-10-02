<?php

namespace App\Http\Controllers;

use App\Survey;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Position;
use App\Subject;
use App\Role;
use Session;


class UserController extends Controller
{
    /**
     * @param $type
     * @param $message
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::pluck('category','id');
        $categories->prepend('Selecciona su categoría');

        $positions = Position::pluck('position','id');
        $positions->prepend('Selecciona su posición');

        $subjects = Subject::pluck('subject','id');
        $subjects->prepend('Selecciona su tema');

        $roles = Role::pluck('role','id');
        $roles->prepend('Selecciona un rol');

        return view('users.index', compact('categories', 'positions', 'subjects', 'roles', 'users'));

    }

    public function listUser()
    {
        $users = User::paginate(6);
        return view('users.list', compact('users'));
    }

    public function searchUser(Request $request)
    {
	$data = $request->input('findUser');

        $results = User::where('username', 'LIKE',  '%' .$data. '%')
            ->orWhere('firstname', 'LIKE',  '%' .$data. '%')
            ->orWhere('lastname', 'LIKE',  '%' .$data. '%')
            ->paginate(6);

        return view('users.search-user', compact('results'));

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
        DB::table('users')->insert([
            'firstname'   => $request->input('firstname'),
            'lastname'    => $request->input('lastname'),
            'email'       => $request->input('email'),
            'password'    => bcrypt($request->input('password')),
            'category_id' => $request->input('category'),
            'position_id' => $request->input('position'),
            'subject_id'  => $request->input('subject'),
            'role_id'      => $request->input('role'),
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
        $user = User::findOrFail($id);
        return response()->json($user);
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
        $userUpdate = DB::table('users')->where('id', $id)->update([
            'firstname'   => $request->input('firstname'),
            'lastname'    => $request->input('lastname'),
            'email'       => $request->input('email'),
            'password'    => bcrypt($request->input('password')),
            'category_id' => $request->input('category'),
            'position_id' => $request->input('position'),
            'subject_id'  => $request->input('subject'),
            'role_id'      => $request->input('role'),
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return response()->json($userUpdate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['done']);
    }
}
