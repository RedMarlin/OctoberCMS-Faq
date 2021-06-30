<?php namespace RedMarlin\Faq\Models;

use DB;
use Model;
use RainLab\Translate\Models\Locale;

/**
 * Question Model
 */
class Question extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['question', 'answer'];

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
    }
}
