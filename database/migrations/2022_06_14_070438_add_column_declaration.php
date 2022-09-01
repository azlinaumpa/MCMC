<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDeclaration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('declarations', function (Blueprint $table) {
            $table->string('userID');
            $table->date('declareDate')->nullable();
            $table->date('offerDate')->nullable();
            $table->enum('type',['asset','gift','bankrupcy'])->nullable();
            $table->text('description')->nullable();
            $table->float('estimateValue')->nullable();
            $table->string('print')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('userID');
        $table->dropColumn('declareDate')->nullable();
        $table->dropColumn('offerDate')->nullable();
        $table->dropColumn('type',['asset','gift','bankrupcy'])->nullable();
        $table->dropColumn('description')->nullable();
        $table->dropColumn('estimateValue')->nullable();
        $table->dropColumn('print')->nullable();
    }
}
