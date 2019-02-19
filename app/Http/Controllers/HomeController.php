<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $page_name_active;

    public function __construct()
    {
        
        $this->page_name_active = 'home';
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home')
            ->with('page_name_active',$this->page_name_active)
            ->with('title','Home');
                 
    }
}
