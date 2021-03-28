<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_organization_id');
            $table->unsignedBigInteger('store_id')->nullable();

            $table->string('account_name');
            $table->string('account_no')->nullable();
            $table->string('branch')->nullable();
            $table->unsignedTinyInteger('account_type')
                ->nullable()
                ->comment('1 = Savings Account, 2 = Current Account, 3 = Joint Account');

            $table->string('swift_code')->nullable();
            $table->string('route_no')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('financial_organization_id')
                ->references('id')
                ->on('financial_organizations')
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
        Schema::dropIfExists('bank_accounts');
    }
}
