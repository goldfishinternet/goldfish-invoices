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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('recipient')->nullable();
            $table->text('message');
            $table->boolean('send')->defaut(0)->nullable();
            $table->boolean('attach')->defaut(0)->nullable();
            $table->datetime('date_sent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('invoice_histories', function (Blueprint $table) {
            $table->foreign('invoice_id', 'invoice_history_invoice_fk')
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
        Schema::dropIfExists('invoice_histories');
    }
};
