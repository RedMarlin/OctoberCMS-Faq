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
            'name'        => 'redmarlin.faq::lang.components.faqlist.name',
            'description' => 'redmarlin.faq::lang.components.faqlist.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'categoryId' => [
                'title'             => 'redmarlin.faq::lang.components.faqlist.category.title',
                'description'       => 'redmarlin.faq::lang.components.faqlist.category.description',
                'default'           => 1,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'redmarlin.faq::lang.components.faqlist.category.validation'
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

        $this->page['category'] = Category::where('id', $this->property('categoryId'))->value('title');
    }
}
