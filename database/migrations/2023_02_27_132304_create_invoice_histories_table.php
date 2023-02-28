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
        Schema::create('invoice_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->integer('client_contacts_id')->nullable();
            $table->datetime('date_sent')->nullable();
            $table->integer('contact_type')->nullable();
            $table->text('email_body');
            $table->timestamps();
        });

        Schema::table('invoice_histories', function (Blueprint $table) {
            $table->foreign('invoice_id', 'invoice_history_invoice_fk')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
            $table->foreign('client_contacts_id', 'invoice_history_client_contact_fk')
                ->references('id')
                ->on('client_contacts')
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
        Schema::dropIfExists('invoice_histories');
    }
};
