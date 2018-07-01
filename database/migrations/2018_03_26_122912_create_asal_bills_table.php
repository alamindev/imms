<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsalBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asal_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_imm')->unique(); 
            $table->string('keterangan'); 
            $table->string('deposit')->unique(); 
            $table->string('kadar'); 
            $table->string('kuantiti'); 
            $table->string('jumlash'); 
            $table->integer('asal_id'); 
            $table->softDeletes();  
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
        Schema::dropIfExists('asal_bills');
    }
}
