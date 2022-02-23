<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User ;
use App\posts ;
use App\Http\Resources\postResource ;
use Illuminate\Support\Facades\Validator;

class postController extends Controller
{

	use apiTrait ;

    public function index(){
    	
    	$data = postResource::collection(posts::all())  ;

    	return $this->indexes($data , 200);
    }

    public function show($id){

    	if(empty(posts::find($id))){
    		$data = null ;
    	}else{
    		$posts = posts::find($id);
    		$data = new postResource($posts) ;
    	}

    	

    	return $this->indexes($data , 200);


    }

    public function store(Request $q){


    $v = Validator::make($q->all() , [
    	'title' => 'min:5' ,
    	'content' => 'max:20' ,

    ]);

    

    
    

    if($v->fails()){
    	 return $this->indexes($v->errors() , 400);
    }


   

    	$posts = posts::create($q->all());



    	if($posts){
    		return $this->indexes($q->all());
    	}
    } 


    public function update(Request $q ){
    	
    	$v = validator::make($q->all() , [

    		'title' => 'required|min:5' ,
    		'content' => 'required|min:20' ,
    	]);

    	if($v->fails()){
    		return $this->indexes($v->errors() , 400);
    	}

    	$post = posts::find($q->id);

    	$post->update($q->all());

    	
    	return $this->indexes($q->all() , 201);
    }

   public function delete($id){

   		$post = posts::find($id);

   		if(empty($post)){
   			return $this->indexes('notFound' , 400);
   		}

   		$post->delete($id);

   		return $this->indexes('siccessful Delete' , 200);




   }
}
