<?php

namespace App\Http\Controllers;

use App\Models\Expression;
use Illuminate\Http\Request;

class FaceExpressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Expression::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'sound' => 'required',
        ]);
        return Expression::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        return Expression::find($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $status)
    {
        $expression=Expression::find($status);
        $expression->update($request->all());
        return $expression;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($status)
    {
        return Expression::destroy($status);
    }
}
