<?php namespace RedMarlin\Faq\Components;

use Cms\Classes\ComponentBase;
use RedMarlin\Faq\Models\Question;
use RedMarlin\Faq\Models\Category;

class FaqList extends ComponentBase
{
    public $faqs;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQ Category list',
            'description' => 'Displays list of FAQs for given category'
        ];
    }

    public function defineProperties()
    {
        return [
             'categoryId' => [
             'title'             => 'Category id',
             'description'       => 'List all questions from given category',
             'default'           => 1,
             'type'              => 'string',
             'validationPattern' => '^[0-9]+$',
             'validationMessage' => 'The Category id property can contain only numeric symbols'
            ],
            'sortOrder' => [
             'title'             => 'Sort Order',
             'description'       => 'Choose sort ordering method. Default newest questions first',
             'default'           => 'desc',
             'type'              => 'dropdown',
             'placeholder'       => 'Select sort order',
             'options'           => ['desc'=>'Newest first', 'asc'=>'Oldest first', 'order'=>'User order']
            ]
        ];
    }
     public function onRun()
    {
     
        $query = Question::whereIsApproved('1')->where('category_id', $this->property('categoryId'));
        
        switch ($this->property('sortOrder')) {
            case "desc":
                $query = $query->orderBy('id', 'desc');
                break;
            case "asc":
                $query = $query->orderBy('id', 'asc');
                break;
            case "order":
                $query = $query->orderBy('sort_order');
                break;
        }

        $query = $query->orderBy('id', 'desc');
        $this->faqs = $query->with('category')
                       ->get();

        $this->page['category'] = Category::where('id', $this->property('categoryId'))->pluck('title');

    }


}
