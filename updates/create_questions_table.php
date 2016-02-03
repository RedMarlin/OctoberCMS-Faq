<?php namespace RedMarlin\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateQuestionsTable extends Migration
{

    public function up()
    {
        Schema::create('redmarlin_faq_questions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->longText('question')->nullable();
            $table->longText('answer')->nullable();
            $table->integer('category_id')->nullable();   
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->string('reply_email')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('redmarlin_faq_questions');
    }

}
