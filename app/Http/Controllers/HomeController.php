<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Quiz;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $_quiz ;
    public function __construct()
    {
        $this->middleware('auth');
        $this->_quiz= new Quiz();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastQuestion=$this->_quiz->getByIdUserAuth(Auth::id());
        $now = new \DateTime('now');
        $isFirstMonth=false;
        if($lastQuestion->count()>=1){
             if($lastQuestion[0]->created_at->month!= $now->format('m')){
                $isFirstMonth=true;
             }    
        }
         return \View::make('home')->with('isFirstMonth', $isFirstMonth);
    }
}
