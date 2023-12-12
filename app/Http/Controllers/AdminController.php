<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = admin::all();
        return view('envio', compact('admins'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }

    public function envio(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'numero' => 'required',
            'tipo' => 'required',
        ]);
        $admin = admin::create($request->all());
       $url = $this->sentWhatApp($admin);
        return response()->json([
            'message' => 'Great success! New task created',
            'task' => $admin,
            'data' => 'ok',
            'url' => $url
        ]);
    }
    public function sentWhatApp($admin){
        $mensaje = "Hola ".$admin->nombre." se te envia este mensaje para invitarte a la fiesta de promocion  2023 ";
        $numero = $admin->numero;
        $url = "https://api.whatsapp.com/send?phone=51".$numero."&text=".$mensaje;
        return $url;

    }
}
