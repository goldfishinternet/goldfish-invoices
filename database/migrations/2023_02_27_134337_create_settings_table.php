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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',75)->nullable();
            $table->string('address_1',100)->nullable();
            $table->string('address_2',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('region',25)->nullable();
            $table->string('country',25)->nullable();
            $table->string('postcode',10)->nullable();
            $table->string('website',150)->nullable();
            $table->string('primary_contact',75)->nullable();
            $table->string('primary_contact_email',50)->nullable();
            $table->string('logo',50)->nullable();
            $table->string('logo_pdf',50)->nullable();
            $table->string('invoice_note_default',255)->nullable();
            $table->string('currency_type',50)->nullable();
            $table->string('currency_symbol',9)->default('$');
            $table->string('tax_code',50)->nullable();
            $table->string('tax_1_desc',50)->nullable();
            $table->decimal('tax_1_rate', 6,2)->default('0.00');
            $table->string('tax_2_desc',50)->nullable();
            $table->decimal('tax_2_rate', 6,2)->default('0.00');
            $table->boolean('save_invoices')->default(false);
            $table->integer('days_payment_due')->default(30);
            $table->boolean('demo_flag')->default(true);
            $table->boolean('display_branding')->default(true);
            $table->decimal('version',4,4)->default('0.0001');
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
        Schema::dropIfExists('settings');
    }
};
