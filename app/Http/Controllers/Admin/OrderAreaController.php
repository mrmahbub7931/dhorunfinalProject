<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderArea;
use Illuminate\Http\Request;

class OrderAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderareas = OrderArea::all();
        return view('admin.orderarea',compact('orderareas'));
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

        OrderArea::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderArea  $orderArea
     * @return \Illuminate\Http\Response
     */
    public function show(OrderArea $orderArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderArea  $orderArea
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderArea  $orderArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderArea $orderArea)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderArea  $orderArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $orderArea = OrderArea::findOrfail($request->CurrentID);
        // return $orderArea;
        $orderArea->delete();
    }
}
