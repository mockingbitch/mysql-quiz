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
        Schema::create('tbl_diem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sinhvien_id');
            $table->foreign('sinhvien_id')->references('id')->on('tbl_sinhvien');
            $table->double('diem_toan');
            $table->double('diem_van');
            $table->double('diem_anh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_diem');
    }
};
