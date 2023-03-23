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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('date_issued')->nullable();
            $table->string('tax_1_desc',50)->nullable();
            $table->decimal('tax_1_rate',6,2)->nullable();
            $table->string('tax_2_desc',50)->nullable();
            $table->decimal('tax_2_rate',6,2)->nullable();
            $table->integer('days_payment_due',false, true)->nullable();
            $table->mediumText('payment_instructions')->nullable();
            $table->mediumText('invoice_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
