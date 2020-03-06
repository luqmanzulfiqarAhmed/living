<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraveYardReg extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPages.AddGraveYard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $graveYardName        = $request->input('graveYardName');
        $graveYardArea        = $request->input('graveYardArea');
        $averageSize          = $request->input('averageSize');
        $numberofGraves       = $request->input('numberofGraves');
        $graveYardDescription = $request->input('graveYardDescription');

        echo  $graveYardName        ; echo "<br>" ;
        echo  $graveYardArea        ; echo "<br>";
        echo  $averageSize          ; echo "<br>";
        echo  $numberofGraves       ; echo "<br>";
        echo  $graveYardDescription ; echo "<br>";
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
        //
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
        //
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
