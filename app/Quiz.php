<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'id','user_id','question1', 'question2', 'question3','created_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getByIdUserAuth($userId){
    	return Quiz::where('user_id', '=' ,$userId)
    			->latest()
    			->limit(1)
                ->get();
    }
    
    public function getAll(){
    	return Quiz::all() ;
    }
}
