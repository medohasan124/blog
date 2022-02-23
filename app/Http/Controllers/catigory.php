<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\catigoryModel ;

class catigory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = catigoryModel::all()  ;
       
       return view('Catigory.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Catigory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =   $this->validate($request , [
            'name' => 'required' ,
        ]);


         catigoryModel::create($data);
        return redirect()->route('catigory.index');
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
         $data = catigoryModel::find($id);
        return view('catigory.edit' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data =   $this->validate($request , [
            'name' => 'required|unique:catigory_models,name,'.$id ,
            
        ]);
      

        $cat =  catigoryModel::find($id);
        $cat->name = $request->name ;
        $cat->save() ;





        return redirect()->route('catigory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         catigoryModel::find($id)->delete();

             return redirect()->route('catigory.index');
    }
}
