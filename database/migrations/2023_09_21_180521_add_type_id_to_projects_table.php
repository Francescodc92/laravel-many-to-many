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
            $table->unsignedBigInteger('type_id')->nullable()->after('description');         //nome assegnato al campo creato nella tabella dipendente (projects)
            
            $table->foreign('type_id') //nome nuovo campo inserito nella tabella pojects (identificativo della tabella indipendete )
                ->references('id') // colonna della tabella a cui mi riferisco (tabella indipendente)
                ->on('types')//tabella indipendente
                ->onUpdate('cascade') //direttive per il comportamento del modifica del campo da cui dipende 
                ->onDelete('set null');  //direttive per il comportamento del delete del campo da cui dipende 
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
