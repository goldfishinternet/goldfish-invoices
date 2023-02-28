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
            $table->id();
            $table->string('company_name',75)->nullable();
            $table->string('address1',100)->nullable();
            $table->string('address2',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('province',25)->nullable();
            $table->string('country',25)->nullable();
            $table->string('postal_code',10)->nullable();
            $table->string('website',150)->nullable();
            $table->string('primary_contact',75)->nullable();
            $table->string('primary_contact_email',50)->nullable();
            $table->string('logo',50)->nullable();
            $table->string('logo_pdf',50)->nullable();
            $table->string('invoice_note_default',255)->nullable();
            $table->string('currency_type',50)->nullable();
            $table->string('currency_symbol',9)->default('$');
            $table->string('tax_code',50)->nullable();
            $table->string('tax1_desc',50)->nullable();
            $table->decimal('tax1_rate', 6,2)->default('0.00');
            $table->string('tax2_desc',50)->nullable();
            $table->decimal('tax2_rate', 6,2)->default('0.00');
            $table->string('save_invoices',1)->default('n');
            $table->integer('days_payment_due')->default('30');
            $table->string('demo_flag',1)->default('n');
            $table->string('display_branding',1)->default('y');
            $table->string('bambooinvoice_version',9)->nullable();
            $table->string('new_version_autocheck',1)->default('n');
            $table->string('logo_realpath',1)->default('n');
            $table->timestamps();
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
