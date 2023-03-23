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
        Schema::create('client_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->string('title',10)->nullable();
            $table->string('first_name',25)->nullable();
            $table->string('last_name',25)->nullable();
            $table->string('email',127)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('mobile',20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('client_contacts', function (Blueprint $table) {
            $table->foreign('client_id', 'client_contact_client_fk')
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
        Schema::dropIfExists('client_contacts');
    }
};
