<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pangkat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pangkat $pangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pangkat $pangkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pangkat $pangkat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pangkat $pangkat)
    {
        //
    }
}
