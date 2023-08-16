<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('date');
            $table->string('code');
            $table->string('lieuvote')->nullable();
            $table->string('bureauvote')->nullable();
            $table->string('numelecteur')->nullable();
            $table->string('tetepont')->nullable();
            $table->string('tetepontdeclaree')->nullable();
            $table->enum('etat', ['paye', 'non_paye'])->default('non_paye');
            $table->enum('statut', ['present', 'absent'])->default('absent');
            $table->string('admin_code')->nullable();// admin // admin_code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};
