<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->Aluno())
        return view('home.aluno');

        else if (Auth::user()->Professor())
        return view('home.professor');

        else if (Auth::user()->Interprete())
        return view('home.interprete');
    }

    public function dashboardAluno()
    {
        return view('home.aluno');
    }
    public function dashboardProfessor()
    {
        return view('home.professor');
    }
    public function dashboardInterprete()
    {
        return view('home.interprete');
    }
}
