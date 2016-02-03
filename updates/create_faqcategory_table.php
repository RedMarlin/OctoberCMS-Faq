<?php namespace RedMarlin\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFaqCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('redmarlin_faq_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->longText('title');
            $table->string('lang')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redmarlin_faq_category');
    }

}
