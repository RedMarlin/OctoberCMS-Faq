<?php namespace RedMarlin\Faq\Components;

use Cms\Classes\ComponentBase;
use RedMarlin\Faq\Models\Question;

class FaqFeatured extends ComponentBase
{
    public $faqsfeatured;

    public function componentDetails()
    {
        return [
            'name'        => 'redmarlin.faq::lang.components.faqfeatured.name',
            'description' => 'redmarlin.faq::lang.components.faqfeatured.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'featuredNumber' => [
                'title'             => 'redmarlin.faq::lang.components.faqfeatured.number.title',
                'description'       => 'redmarlin.faq::lang.components.faqfeatured.number.description',
                'default'           => 5,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'redmarlin.faq::lang.components.faqfeatured.number.validation'
            ]
        ];
    }

    public function onRun()
    {
        $this->faqsfeatured = Question::whereIsApproved('1')
                                ->whereIsFeatured('1')
                                ->orderBy('id', 'desc')
                                ->take($this->property('featuredNumber'))
                                ->get();
    }
}
