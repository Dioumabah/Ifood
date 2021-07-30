<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeVisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_visiteurs', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->date('date_commande');
            $table->string('status');
            $table->text('plats');
            $table->foreignId('visiteur_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_visiteurs');
    }
}
