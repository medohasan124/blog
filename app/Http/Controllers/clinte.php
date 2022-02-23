<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clintes ;
class clinte extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = clintes::all();
        return view('client.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
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
            'phone' => 'required|max:12' ,
            'address' => 'required',
           
            'idCard' => 'required|max:16|unique:clintes,idcard',
        ]);

         
         clintes::create($data);
         notify()->success('Sccess To Add Client');

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = clintes::find($id);
        return view('client.edit' , compact('data'));
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
            'name' => 'required' ,
            'phone' => 'required|max:12' ,
            'address' => 'required',
           
            'idCard' => 'required|max:16|unique:clintes,idcard,'.$id,
        ]);

        $client =  Client::find($id);
        $client->username = $request->username ;
        $client->number = $request->number ;
        $client->location = $request->location ;
        $client->email = $request->email ;
        $client->save() ;

        notify()->success('Sccess To update Client');

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
