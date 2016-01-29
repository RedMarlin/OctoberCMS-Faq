<?php namespace REDMARLIN\Faq\Models;

use Model;
use DB;


/**
 * Answer Model
 */
class Category extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'redmarlin_faq_category';

    public $rules = [
        'title' => 'required',
        'lang' => 'required|string',
    ];
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
    
    /**
     * @var array Fillable fields
     */
    protected $fillable = ['title'];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'question' => 'REDMARLIN\Faq\Models\Question'
    ];
   

}