<?php

namespace App\Http\Controllers;

use App\Http\Resources\DocenteResource;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = DocenteResource::collection(Docente::all());
        return Inertia::render('Docentes/Index', compact('docente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Docentes/Create');
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
            'nombre'=> 'required',
            'paterno'=> 'required',
            'materno'=> 'required',
            'sexo' => 'required',
            'celular' => 'numeric',
            'correo' => 'required',
        ]);

        
        //return $request->all();
        $docente = new docente();

        $docente->nombre = $request->nombre;
        $docente->paterno = $request->paterno;
        $docente->materno = $request->materno;
        $docente->sexo = $request->sexo;
        $docente->celular = $request->celular;
        $docente->correo = $request->correo;

       $docente->save();

       return Redirect::route('docentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return Inertia::render('Docentes/Edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'nombre'=> 'required',
            'paterno'=> 'required',
            'materno'=> 'required',
            'sexo' => 'required',
            'celular' => 'numeric',
            'correo' => 'required',
        ]);

        $docente->nombre = $request->nombre;
        $docente->paterno = $request->paterno;
        $docente->materno = $request->materno;
        $docente->sexo = $request->sexo;
        $docente->celular = $request->celular;
        $docente->correo = $request->correo;

       $docente->save();

       return Redirect::route('docentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();

        return Redirect::route('docentes.index');

    }
}
