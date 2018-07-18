<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class User extends Authenticatable implements AuthenticableContract
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    public $timestamps;

    protected $fillable = ['nome', 'email', 'senha'];

    protected $hidden = ['senha'];
    
    public function getAuthPassword() {
        return $this->senha;        
    }
    
    protected $casts = [
        'status' => 'boolean'
    ];
    
    public function perfis() {
        return $this->belongsToMany(Perfil::class, "usuario_perfil", $this->primaryKey, "id_perfil");
    }
    
    public function scopeAtivos($query) {
        return $query->where("status", 1);
    }
    
    public function getRememberToken() {
        return null;
    }
    
    public function setRememberToken($param) {
        
    }
    
    public function setAttribute($key, $value) {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }        
    }
}
