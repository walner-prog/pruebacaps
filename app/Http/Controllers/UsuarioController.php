<?php

// app/Http/Controllers/UsuarioController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
// Agregamos lo siguiente para roles permission
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
//use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Rol;
use App\Models\RegistroAgua;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    //  use WithPagination;
    public $paginationTheme = "bootstrap";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       
     public function __construct()
     {
         $this->middleware('permission:ver-usuario|crear-usuario|borrar-usuario', ['only'=>['index']]);

         $this->middleware('permission:crear-usuario', ['only'=>['create','store']]);

         $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);

         $this->middleware('permission:borrar-usuario', ['only'=>['destroy']]);
         $this->middleware('auth');
     }


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   // protected $paginationTheme = "bootstrap";
    public function index()
    {$usuarios = User::paginate(8);
        return view('usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        //
      
         $roles = Role::pluck('name', 'name')->all();
         return view('usuarios.crear',compact('roles'));
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
        
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
         //   'password' => 'required|same:confirm-password',
            'roles' => 'required|',
          ]);
          $usuarios = User::paginate(8);
           $input = $request->all();
           $input['password'] = Hash::make($input['password']);

           $user = User::create($input);
           $user->assignRole($request->input('roles'));
           return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('usuarios.editar', compact('user','roles','userRole'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
          //  'password' => 'same:confirm-password',
            'roles' => 'required|',
          ]);

          $input = $request->all();
          if(!empty($input['password'])){
             $input['password'] = Hash::make($input['password']);

          }
          else{
            $input = Arr::except($input, array('password'));

          }
             $user = User::find($id);
             $user->update($input);
             DB::table('model_has_roles')->where('model_id', $id)->delete();

             $user->assignRole($request->input('roles'));
             return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }



   

   /*   permitir que los usuarios cambien su contraseña después de haber iniciado sesión  función en el controlador que maneje el formulario de cambio de contraseña
    y otra función para procesar el cambio de contraseña.*/

    public function showChangePasswordForm()
{
         $user = User::all();
        $usuarios = User::all(); 
    return view('cambiar.password');
}

    public function changePassword(Request $request)
    {
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $usuario = Auth::user();

    // Verificar que la contraseña actual sea correcta
    if (!Hash::check($request->current_password, $usuario->password)) {
        return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
    }

    // Cambiar la contraseña
    $usuario->update([
        'password' => Hash::make($request->new_password),
    ]);

  
    return redirect()->route('usuarios.index', $usuario)->with('success', 'Contraseña actualizada exitosamente.');
    }

  // Para permitir que el usuario descargue la tabla con los registros en formato PDF o SQL :
  
    public function downloadPDF()
      {
        $usuarios = User::all();
    
        $pdf = User::loadView('usuarios.pdf', compact('usuarios'));
        return $pdf->download('usuarios.pdf');
 
    }

// Para desacragar en formato sql  ///////////////////////////////



    public function downloadSQL()
{
    $usuarios = User::all();

    $sql = '';
    foreach ($usuarios as $usuario) {
        $sql .= "INSERT INTO usuarios (id, name, email, Direccion, Contacto) VALUES ({$usuario->id}, '{$usuario->name}', '{$usuario->email}', '{$usuario->Direccion}', '{$usuario->Contacto}');\n";
    }

    $filename = 'usuarios.sql';

    File::put(storage_path($filename), $sql);

    return Response::download(storage_path($filename), $filename)->deleteFileAfterSend();
}




public function exportCSV()
{
    $usuarios = User::all();

    $csvFileName = 'usuarios_backup.csv';

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$csvFileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $handle = fopen('php://output', 'w');

    // Encabezados del CSV
    fputcsv($handle, ['ID', 'Nombre', 'Email', 'Dirección', 'Datos de Contacto']);

    // Datos de los usuarios
    foreach ($usuarios as $usuario) {
        fputcsv($handle, [$usuario->id, $usuario->name, $usuario->email, $usuario->Direccion, $usuario->Contacto]);
    }

    fclose($handle);

    return Response::make(file_get_contents('php://output'), 200, $headers);
}   

/// *********** Aca tengo la logica de crear y editar Roles ////////////////////
//////////////////*************************//////////////// 

  /*public function editarRoles(User $usuario)
{
    $roles = Role::all();
    return view('usuarios.editar-roles', compact('usuario', 'roles'));
}

public function asignarRoles(Request $request, User $usuario)
{
    // Validar y asignar roles y permisos según la entrada del formulario
    $request->validate([
        'roles' => 'required|array',
        // Otras validaciones si es necesario
    ]);

    $usuario->syncRoles($request->input('roles'));

    return redirect()->route('usuarios.index')->with('success', 'Roles asignados correctamente.');
}*/
}
