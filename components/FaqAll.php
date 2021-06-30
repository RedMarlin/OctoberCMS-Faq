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
            'name'        => 'redmarlin.faq::lang.components.faqall.name',
            'description' => 'redmarlin.faq::lang.components.faqall.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'limit' => [
                'title'             => 'redmarlin.faq::lang.components.faqall.limit.title',
                'description'       => 'redmarlin.faq::lang.components.faqall.limit.description',
                'default'           => 25,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'redmarlin.faq::lang.components.faqall.limit.validation'
            ],
            'sortOrder' => [
                'title'             => 'redmarlin.faq::lang.sorting.title',
                'description'       => 'redmarlin.faq::lang.sorting.description',
                'default'           => 'desc',
                'type'              => 'dropdown',
                'placeholder'       => 'redmarlin.faq::lang.sorting.placeholder',
                'options'           => [
                    'desc' => 'redmarlin.faq::lang.sorting.desc',
                    'asc' => 'redmarlin.faq::lang.sorting.asc',
                    'order' => 'redmarlin.faq::lang.sorting.order',
                ]
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
