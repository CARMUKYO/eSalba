<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('issue_reports', function (Blueprint $table) {
        $table->string('status')->default('Open'); // Default status is 'Open'
    });
    }

    public function down()
    {
    Schema::table('issue_reports', function (Blueprint $table) {
        $table->dropColumn('status');
    });
    }

};
