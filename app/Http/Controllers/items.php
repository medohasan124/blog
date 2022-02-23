<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel ;
class items extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $q)
    {
          $data = itemModel::select(['item_models.*' , 'catigory_models.name as cat_name'])
            ->join('catigory_models' , 'catigory_models.id' ,'=' , 'item_models.cat_id')
            ->where(function($query) use($q){
                if($q['id']){
                    $query->where('cat_id' , $q['id']);
                }
            })->get();

            
           

       

        
           return view('items.index' , compact('data'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =   $this->validate($request, [
        'name' => 'required',
        'cat_id' => 'required',
        'salary' => 'required',
        'salesSalary' => 'required',
        'count' => 'required',
        'srialNumber' => 'required|unique:item_models,srialNumber',
        'color' => 'required',
       ]);

     

      itemModel::create($data);


       notify()->success('Sccess To Add Item');
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data = itemModel::where('id' , $id)->get()->first();


            return view('items.edit' , compact('data' , 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $q, $id)
    {
       
            $data =   $this->validate($q, [
        'name' => 'required',
        'cat_id' => 'required',
        'salary' => 'required',
        'salesSalary' => 'required',
        'count' => 'required',
        'srialNumber' => 'required|unique:item_models,srialNumber,'.$id,
        'color' => 'required',
       ]);

             


            $items = itemModel::where('id' , $id)->get()->first();
            $items->name = $q->name ;
            $items->salary = $q->salary ;
            $items->salesSalary = $q->salesSalary ;
            $items->count = $q->count ;
           
            $items->color = $q->color ;
            $items->cat_id = $q->cat_id ;


            $items->save();



           
        notify()->success('Sccess To Update Item');

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = itemModel::find($id);
        $items->delete() ;
         notify()->success('Sccess To Delete Item');
        return redirect()->route('items.index');
    }
}
