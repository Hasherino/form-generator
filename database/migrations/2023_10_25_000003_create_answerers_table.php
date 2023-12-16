<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answerers', function (Blueprint $table) {
            $table->uuid("id")->primary()->default(DB::raw('(gen_random_uuid())'));
            $table->uuid("form_id");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answerers');
    }
};
