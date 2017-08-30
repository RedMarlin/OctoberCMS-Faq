<?php namespace RedMarlin\Faq\Components;

use Cms\Classes\ComponentBase;
use RedMarlin\Faq\Models\Question;
use RedMarlin\Faq\Models\Category;

class FaqAll extends ComponentBase
{
    public $faqs;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQ - Display All',
            'description' => 'Displays list of FAQs from all categories'
        ];
    }

    public function defineProperties()
    {
        return [
             'limit' => [
             'title'             => 'Limit',
             'description'       => 'Limit list to X questions',
             'default'           => 25,
             'type'              => 'string',
             'validationPattern' => '^[0-9]+$',
             'validationMessage' => 'The Limit property can contain only numeric symbols'
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
     
        $query = Question::whereIsApproved('1');
        
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

        
        $this->faqs = $query->take($this->property('limit'))->get();

        

    }


}