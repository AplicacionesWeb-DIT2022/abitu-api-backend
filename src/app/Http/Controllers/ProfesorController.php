<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Http\Requests\ProfesorRequest;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profesores = Profesor::all();
        // return $profesores;
        $profesores = Profesor::get();
        return view('profesores.index', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesorRequest $request)
    {
        // $profesor = Profesor::create($request->all());
        // return $profesor;
        Profesor::create($request->all());
        return redirect()->route('profesores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Profesor::findOrFail($id);
        return $profesor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor, $id)
    {
        // $profesor = Profesor::findOrFail($id)->update($request->all());
        // return $profesor;

        // $profesor->fill($request->all());
        // $profesor->save();
        Profesor::findOrFail($id)->update($request->all());
        return redirect()->route('profesores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::destroy($id);
        // return \response(content: "El profesor a sido eliminado");
        return redirect()->route('profesores.index');
    }
}
