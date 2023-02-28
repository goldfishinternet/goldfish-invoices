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
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->default(0);
            $table->date('date_paid')->nullable();
            $table->decimal('amount_paid',7,2)->default(0.00);
            $table->string('payment_note')->nullable();
            $table->timestamps();
        });

        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->foreign('invoice_id', 'invoice_payment_invoice_fk')
                ->references('id')
                ->on('invoices')
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
        Schema::dropIfExists('invoice_payments');
    }
};
