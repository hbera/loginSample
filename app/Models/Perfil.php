<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfil";
    protected $primaryKey = "id_perfil";
    
    public $timestamps = false;
    
    protected $fillable = [];
    
    protected $visible = ["id_perfil", "desc_perfil", "nm_nivel"];
    
    public function usuarios() {
        return $this->belongsToMany(User::class, 'usuario_perfil', $this->primaryKey, 'id_usuario');
        
    }
}
