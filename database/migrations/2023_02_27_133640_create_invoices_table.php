<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('date_issued')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('tax1_desc')->nullable();
            $table->decimal('tax1_rate',6,3)->nullable();
            $table->string('tax2_desc')->nullable();
            $table->decimal('tax2_rate',6,3)->nullable();
            $table->text('invoice_note');
            $table->integer('days_payment_due',false, true)->nullable();
            $table->timestamps();
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('client_id', 'invoice_client_fk')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
