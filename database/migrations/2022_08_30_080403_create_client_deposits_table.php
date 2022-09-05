<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_deposits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->uuid('client_wallet_id');
            $table->foreign('client_wallet_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('top_up_account');
            $table->double('recharge_amount');
            $table->string('included_in_performance');
            $table->enum('recharge_status', ['PENDING', 'APPROVED', 'DISSAPROVED']);
            $table->string('account_type');
            $table->string('ip_address');
            $table->string('submission_time');
            $table->string('response_time');
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
        Schema::dropIfExists('client_deposits');
    }
}
