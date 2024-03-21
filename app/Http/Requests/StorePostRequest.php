<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\tag;
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */ /* El metodo authorize sirve para limitar el acceso aciertas secciones 
     de la aplicacion o sistema solo a usuarios que cumplan ciertas 
     condiciones */
    public function authorize()
    {
          // Aca pregunto si el valor que mando en el campo user_id concide con el user autentificado
        if($this->user_id == auth()->user()->id){
                  // Cambie el valor a true
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
      {
      
            /*aca estan las reglas de validacion si en el formulario de crear nuevo post 
            el usuario escoge el valor de 1 que equivale a borrador 
            las reglas que se tomaran en cuenta solo son las primeras pero 
            si escoge el 2 entrara en el if con el estatus 2 y las demas reglas tambien  */ 

           $rules =[
              'name' => 'required',
              // espesifico que el campo slug debe ser requerido y unico en la taqbla posts
              'slug' => 'required',
              'status' => 'required|in:1,2'
           ];
           if($this->status == 2){
              // El metodo array merge lo que hace es fucionar dos array
              $rules = array_merge($rules, [
                  'category_id' => 'required',
                  'tags' => 'required',
                  'extract' => 'required',
                  'body' => 'required'
               ]);

           }
           // aca pedimos que nos retorne las reglas de validacion
               return $rules;
       
    }
}
