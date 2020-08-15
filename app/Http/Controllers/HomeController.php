<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\User;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $users = User::where('ID', Auth::id())->first();

        $videos = Video::latest()->paginate(5);

        if ($users->status==1)
        {
            return view('home', compact('videos'));
        } else
            {
                return view('confirmemail');
            }
        
    }

    public function approval()
    {
        $users = User::where('ID', Auth::id())->first();

        $videos = Video::latest()->paginate(5);

        if ($users->status==1)
        {
            return view('approval');
        } else
            {
                return view('confirmemail');
            }
    }

    
}
