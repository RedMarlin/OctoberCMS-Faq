<?php namespace RedMarlin\Faq\Components;

use Cms\Classes\ComponentBase;
use RedMarlin\Faq\Models\Question;
use Router;

class FaqLast extends ComponentBase
{
    public $faqs;

    public function componentDetails()
    {
        return [
            'name'        => 'redmarlin.faq::lang.components.faqlast.name',
            'description' => 'redmarlin.faq::lang.components.faqlast.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'questionNumber' => [
                'title'             => 'redmarlin.faq::lang.components.faqlast.number.title',
                'description'       => 'redmarlin.faq::lang.components.faqlast.number.description',
                'default'           => 5,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'redmarlin.faq::lang.components.faqlast.number.validation'
            ]
        ];
    }

    public function onRun()
    {
        $this->faqs = Question::whereIsApproved('1')
                        ->orderBy('id', 'desc')
                        ->with('category')
                        ->take($this->property('questionNumber'))
                        ->get();
    }
}
