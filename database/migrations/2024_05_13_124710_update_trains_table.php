<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trains', function (Blueprint $table){
           $table->text('desciption')->after('train_number');
           $table->boolean('deleted')->default(false)->after('in_time');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table){
            $table->dropColumn('desciption');
            $table->dropColumn('deleted');

         });
    }
};