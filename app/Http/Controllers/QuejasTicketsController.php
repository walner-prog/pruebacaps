<?php

namespace App\Http\Controllers;

use App\Models\QuejasTickets;
use App\Models\User;
use Illuminate\Http\Request;

class QuejasTicketsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quejasTickets = QuejasTickets::all();
        $usuario = User::all();
        return view('quejas_tickets.index', compact('quejasTickets', 'usuario'));
    }

    public function create()
    {
        $usuarios = User::all();
        $quejasTickets = QuejasTickets::all();
        return view('quejas_tickets.create', compact('quejasTickets','usuarios'));
    }

    public function store(Request $request)
    {
      $quejasTickets =  QuejasTickets::create($request->all());
        return redirect()->route('quejas_tickets.index',compact('quejasTickets'))->
        with('create', 'Queja o ticket creada exitosamente.');
        return response()->json(['success' => 'Tickests  creado exitosamente.']); 
    }

    public function show($id)
    {
        $quejasTickets = QuejasTickets::findOrFail($id);
        return view('quejas_tickets.show', compact('quejasTickets'));
    }

    public function edit($id)
    {
        $quejasTickets = QuejasTickets::findOrFail($id);
        $usuarios = User::all();
        return view('quejas_tickets.edit', compact('quejasTickets', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $quejasTickets = QuejasTickets::findOrFail($id);
        $quejasTickets->update($request->all());
        return redirect()->route('quejas_tickets.index',$quejasTickets)->with('update', 'Queja o ticket actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $quejasTickets = QuejasTickets::findOrFail($id);
        $quejasTickets->delete();
        return redirect()->route('quejas_tickets.index')->with('delete', 'Queja o ticket eliminado exitosamente.');
    }
}
