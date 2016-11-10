<?php namespace RedMarlin\Faq\Models;

use Model;
use DB;


/**
 * Answer Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'redmarlin_faq_category';

    public $rules = [
        'title' => 'required',
        'lang' => 'string',
    ];
    
    /**
     * @var array Translatable fields
     */
    public $translatable = ['title'];
    
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

        // Check the translate plugin is installed
        if (!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return;
        }

        // Extend the constructor of the model
        self::extend(function ($model) {

            // Implement the translatable behavior
            $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';

        });
    }

}
