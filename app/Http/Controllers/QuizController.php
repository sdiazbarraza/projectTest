<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_quiz ;
    public function __construct(){
            $this->_quiz= new Quiz();
    }
    #use Validator, Input, Redirect; 
    public function index()
    {
        if(\Request::route()->named('questionme')=="questionme"){
                $collectQuiz=$this->_quiz->getByIdUserAuth(Auth::id());
        }else if(\Request::route()->getName()=="questionall" &&  Auth::user()->role==1){
                $collectQuiz=$this->_quiz->getAll();
        }
        return \View::make('index')->with('collectQuiz', $collectQuiz);
   }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'question1' => 'required|string|max:255',
            'question2' => 'required|integer',
            'question3' => 'required|integer',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $dataValidate=[
            'question1' => $data['question1'],
            'question2' => $data['question2'],
            'question3' => $data['question3'],
             ];
        $newQuiz= new Quiz($dataValidate);
        $user = Auth::user();
        $newQuiz->user()->associate($user);
        return $newQuiz->save();
        

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->validator($request->all())->validate()){
                $this->create($request->all());
                 return redirect()->route('quiz.index')
                        ->with('success','Article created successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
