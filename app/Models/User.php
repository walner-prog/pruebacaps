<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Spatie\Permission\Traits\HasRoles;


// referencie spatie
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasRoles;
    protected $fillable = ['name', 'email', 'password', 'Direccion', 'Contacto'];
    
    
    public function rol(){

        return $this->belongsTo(Rol::class, 'RolID');
       }
    
        public function lecturas()
        {
            return $this->hasMany(LecturaMedidor::class, 'UsuarioID');
        }
    
        public function facturas()
        {
            return $this->hasMany(Factura::class, 'ClienteID');
        }
    
        public function mantenimientos()
        {
            return $this->hasMany(Mantenimiento::class, 'UsuarioID');
        }
    
        public function quejasTickets()
        {
            return $this->hasMany(QuejasTickets::class, 'UsuarioID');
        }
    
        public function alertasAutomaticas()
        {
            return $this->hasMany(AlertasAutomaticas::class, 'UsuarioID');
        }
    
        // Relación uno a muchos con la tabla 'registro_agua'
         public function registrosAgua()
        {
            return $this->hasMany(RegistroAgua::class, 'user_id');
        }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion entre users y post  uno a muchos
    public function posts(){
       return $this->hasMany(post::class);
       
    }

}
