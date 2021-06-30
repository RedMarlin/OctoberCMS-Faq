<?php namespace RedMarlin\Faq\Models;

use DB;
use Model;
use RainLab\Translate\Models\Locale;

/**
 * Answer Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['title'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'redmarlin_faq_category';

    public $rules = [
        'title' => 'required',
        'lang' => 'string',
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
        'question' => 'RedMarlin\Faq\Models\Question'
    ];
    public $timestamps = false;

    /**
     * Add translation support to this model, if available.
     * @return void
     */
    public static function boot()
    {
        // Call default functionality (required)
        parent::boot();
    }
}
