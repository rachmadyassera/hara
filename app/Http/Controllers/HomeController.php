<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Confrence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datenow =Carbon::now();
        $rapat = Confrence::with(['user','opd','location'])->whereDate('tanggal',$datenow)->latest()->get()->where('status','enable');
        // return view('home');
        // dd($rapat);
        return view('front-end.home', compact('rapat'));

    }
}
