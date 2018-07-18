<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuarioPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_perfil', function (Blueprint $table){
            $table->primary(["id_usuario", "id_perfil"]);            
            $table->unsignedInteger("id_usuario");
            $table->unsignedInteger("id_perfil");
            $table->foreign("id_usuario")->references("id_usuario")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_perfil")->references("id_perfil")->on("perfil")->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_perfil');

        Schema::table("usuario_perfil", function (Blueprint $table){
            $table->dropForeign("id_usuario");
            $table->dropForeign("id_perfil");
        });
    }
}
