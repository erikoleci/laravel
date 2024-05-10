<?php

namespace App\Http\Controllers;

use App\Spin;
use App\ToolsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $spin= new Spin;
        $spin->user_id=logged_in()->id;
        $spin->prize=$request['prize'];
        $spin->description=$request['description'];
        $spin->save();

        ToolsRepository::changeSpin(logged_in()->id, 0);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spin  $spin
     * @return \Illuminate\Http\Response
     */
    public function show(Spin $spin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spin  $spin
     * @return \Illuminate\Http\Response
     */
    public function edit(Spin $spin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spin  $spin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spin $spin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spin  $spin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spin $spin)
    {
        //
    }
}
