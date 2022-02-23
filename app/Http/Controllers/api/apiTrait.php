<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;


trait apiTrait{  

 public function indexes($data= null,$status = null){

 	

 	

       $array = [
           'data'=>$data,
           'status'=>$status,
       ];
 	
 	return response($array);	
 	
 	
 }
}
