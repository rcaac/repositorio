<?php

namespace App\Http\Controllers;

use App\Investigation;
use App\State;
use Illuminate\Http\Request;
use DB;

class SelectController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function category(Request $request)
    {
        return DB::table('categories')
            ->join('users', 'users.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.category')
            ->where('users.id', '=', $request->input('id'))
            ->union(
                DB::table('categories')
                    ->select('categories.id', 'categories.category')
            )
            ->get();

    }

    public function position(Request $request)
    {
        return DB::table('positions')
            ->join('users', 'users.position_id', '=', 'positions.id')
            ->select('positions.id', 'positions.position')
            ->where('users.id', '=', $request->input('id'))
            ->union(
                DB::table('positions')
                    ->select('positions.id', 'positions.position')
            )
            ->get();

    }

    public function subject(Request $request)
    {
        return DB::table('subjects')
            ->join('users', 'users.subject_id', '=', 'subjects.id')
            ->select('subjects.id', 'subjects.subject')
            ->where('users.id', '=', $request->input('id'))
            ->union(
                DB::table('subjects')
                    ->select('subjects.id', 'subjects.subject')
            )
            ->get();

    }

    public function role(Request $request)
    {
        return DB::table('roles')
            ->join('users', 'users.role_id', '=', 'roles.id')
            ->select('roles.id', 'roles.role')
            ->where('users.id', '=', $request->input('id'))
            ->union(
                DB::table('roles')
                    ->select('roles.id', 'roles.role')
            )
            ->get();

    }

    public function status(Request $request)
    {
        return DB::table('status')
            ->join('investigations', 'investigations.state_id', '=', 'status.id')
            ->select('status.id', 'status.state')
            ->where('investigations.id', '=', $request->input('id'))
            ->union(
                DB::table('status')
                    ->select('status.id', 'status.state')
            )
            ->get();

    }

    public function theme(Request $request)
    {
        return DB::table('subjects')
            ->join('investigations', 'investigations.subject_id', '=', 'subjects.id')
            ->select('subjects.id', 'subjects.subject')
            ->where('investigations.id', '=', $request->input('id'))
            ->union(
                DB::table('subjects')
                    ->select('subjects.id', 'subjects.subject')
            )
            ->get();

    }
}
