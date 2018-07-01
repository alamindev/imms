<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('daripada');
            $table->string('perniagaan');
            $table->string('alamat');
            $table->string('im');
            $table->string('no_resit');
            $table->date('date');
            $table->string('ringgit');
            $table->string('bayaran_name');
            $table->string('bayaran_number');
            $table->string('notis_makluman')->nullable();
            $table->string('ptj');
            $table->string('mashana_name');
            $table->string('mashana_no');
            $table->string('n_name')->nullable();
            $table->string('n_number')->nullable();
            $table->string('kelulusan'); 
            $table->integer('employee_id');
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
        Schema::dropIfExists('asals');
    }
}
