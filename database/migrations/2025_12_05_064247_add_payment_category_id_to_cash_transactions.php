<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('cash_transactions', function (Blueprint $table) {
        $table->foreignId('payment_category_id')
              ->nullable()
              ->constrained('payment_categories')
              ->cascadeOnDelete();
    });
}

public function down()
{
    Schema::table('cash_transactions', function (Blueprint $table) {
        $table->dropForeign(['payment_category_id']);
        $table->dropColumn('payment_category_id');
    });
}

};
