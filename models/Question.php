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
     * @var array Translatable fields
     */
    public $translatable = ['question', 'answer'];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['question', 'answer'];

    /**
     * @var array Relations
     */
     public $belongsTo = [
        'category' => 'RedMarlin\Faq\Models\Category'
    ];
     
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
