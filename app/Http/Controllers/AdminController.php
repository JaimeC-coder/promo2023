<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    //
    $link = $request->get('link');
    $invitado = $request->get('invitado');
    $admins = admin::all();
    $url = null;
    foreach ($admins as $admin) {
        $admin->url = $this->sentWhatApp($admin);
      }

    if ($link) {
      $admin = admin::find($invitado);
      $url = $this->sentWhatApp($admin);
      if ($admin) {
        return view('envio', compact('admins', 'url'));
      } else {
        redirect()->route('index');
      }
    }

    return view('envio', compact('admins' , 'url'));
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
    try {
      DB::beginTransaction();
      $request->validate([
        'nombre' => 'required',
        'numero' => 'required',
        'tipo' => 'required',
      ]);
      $admin = admin::create($request->all());
      $url = $this->sentWhatApp($admin);
      $invitados = admin::all();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return response()->json([
        'success' => false,
        'message' => 'Ocurrio un error al registrar el invitado',
        'error' => $e->getMessage()
      ]);
    }
    return response()->json([
      'success' => true,
      'message' => 'Se registro el invitado correctamente',
      'invitado' => $admin->id,
      'info' => $invitados,
      'url' => $url
    ]);
  }
  public function sentWhatApp($admin)
  {
    $url = "http://localhost:8000/invitacion/" . $admin->id;
    $mensaje = "Hola " . $admin->nombre . "se te envia este mensaje para invitarte a la fiesta de promocion  2023 ". $url;
    return $mensaje;
  }
}
