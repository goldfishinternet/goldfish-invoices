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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id')->default(0);
            $table->decimal('amount',11,2)->default(0.00);
            $table->decimal('quantity',7,2)->default(1.00);
            $table->mediumText('work_description');
            $table->boolean('taxable')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->foreign('invoice_id', 'invoice_item_invoice_fk')
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
        Schema::dropIfExists('invoice_items');
    }
};
