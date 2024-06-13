<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->text('nom_prenom');
            $table->string('email_user')->unique();
            $table->text('photo_user')->nullable();
            $table->string('sexe_user', 2);
            $table->date('date_naiss');
            $table->string('tel');
            $table->string('tel_whatsapp')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
