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
            $table->boolean('tax_status')->default(1)->nullable();
            $table->mediumText('client_notes')->nullable();
            $table->string('tax_code',150)->nullable();
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
