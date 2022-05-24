<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Http\Requests\AlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::get();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        // $alumno = Alumno::create($request->all());
        // return $alumno;
        
        Alumno::create($request->all());
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return $alumno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, Alumno $alumno)
    {
        // $alumno = Alumno::findOrFail($id)->update($request->all());
        // return $alumno;
        
        $alumno->fill($request->all());
        $alumno->save();
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::destroy($id);
        // return \response(content: "El alumno a sido eliminado");
        return redirect()->route('alumnos.index');
    }
}
