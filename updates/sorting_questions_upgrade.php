<?php namespace RedMarlin\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SortingQuestionsUpgrade extends Migration
{

    public function up()
    {
        Schema::table('redmarlin_faq_questions', function($table)
        {
            $table->integer('sort_order')->nullable();   
        });
    }

    public function down()
    {
        Schema::table('redmarlin_faq_questions', function($table)
        {
            $table->dropColumn(array('sort_order'));   
        });
    }

}
