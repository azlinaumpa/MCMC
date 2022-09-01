<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusApproval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('declarations', function (Blueprint $table) {
            
            $table->enum('status',['pending','reviewed','completed'])->nullable();
            $table->enum('approval',['approved','rejected'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('status',['pending','reviewed','completed'])->nullable();
        $table->dropColumn('approval',['approved','rejected'])->nullable();
    }
}
