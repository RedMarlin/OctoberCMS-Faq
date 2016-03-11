<?php namespace RedMarlin\Faq\Models;

use Model;
use DB;

/**
 * Question Model
 */
class Question extends Model
{
     use \October\Rain\Database\Traits\Validation;
     use \October\Rain\Database\Traits\Sortable;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'redmarlin_faq_questions';

    public $rules = [
        'category_id' => 'integer|required',
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
        'answer' => ''
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['text', 'answer'];

    /**
     * @var array Relations
     */
     public $belongsTo = [
        'category' => 'RedMarlin\Faq\Models\Category'
    ];
  

}