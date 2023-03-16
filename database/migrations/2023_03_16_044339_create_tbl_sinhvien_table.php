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
        Schema::create('tbl_sinhvien', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->date('ngay_nhap_hoc')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->unsignedBigInteger('lop_id');
            $table->foreign('lop_id')->references('id')->on('tbl_lop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sinhvien');
    }
};
