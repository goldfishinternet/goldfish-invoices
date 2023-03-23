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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',75)->nullable();
            $table->string('address_1',100)->nullable();
            $table->string('address_2',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('region',25)->nullable();
            $table->string('country',25)->nullable();
            $table->string('postcode',10)->nullable();
            $table->string('email',127)->nullable();
            $table->string('website',150)->nullable();
            $table->string('tax_code',150)->nullable();
            $table->boolean('tax_status')->default(1)->nullable();
            $table->mediumText('client_notes')->nullable();
            $table->string('default_tax_1_desc',50)->nullable();
            $table->decimal('default_tax_1_rate', 6,2)->default('0.00');
            $table->string('default_tax_2_desc',50)->nullable();
            $table->decimal('default_tax_2_rate', 6,2)->default('0.00');
            $table->integer('default_days_payment_due')->default(30);
            $table->mediumText('default_payment_instructions')->nullable();
            $table->mediumText('default_invoice_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
