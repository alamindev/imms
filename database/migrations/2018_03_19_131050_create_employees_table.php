<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('gender');
            $table->string('nationality');
            $table->string('remarks');
            $table->string('ref_no');
            $table->date('date');
            $table->date('issue_date'); 
            $table->string('place_issue');   
            $table->string('receipt_no');   
            $table->string('fee_paid');   
            $table->string('vd'); 
            $table->string('vp_no'); 
            $table->string('picture'); 
            $table->string('signature'); 
            $table->string('identification_card_no');
            $table->string('company_reg_no');
            $table->string('application_number');
            $table->string('doc_number')->unique();
            $table->string('country');
            $table->string('seramay');
            $table->string('surat'); 
            $table->string('sejumlah');
            $table->string('tempoh');
            $table->string('jawatan');
            $table->boolean('status')->default(1);  
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
        Schema::dropIfExists('employees');
    }
}
