<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;

class RolController extends Controller
{

    
    public $paginationTheme = "bootstrap";
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        Rol::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
