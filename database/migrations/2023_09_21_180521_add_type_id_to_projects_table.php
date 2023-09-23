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
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable()->after('description');        
            
            $table->foreign('type_id') 
                ->references('id') 
                ->on('types')
                ->onUpdate('cascade') 
                ->onDelete('set null');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //rimuovo la FK altrimenti non posso eliminare il campo
            $table->dropForeign(['type_id']);
            //rimuovo la colonna 
            $table->dropColumn('type_id');
        });
    }
};
