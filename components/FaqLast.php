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
            'name'        => 'FAQ Latest Questions',
            'description' => 'Displays latest questions'
        ];
    }

    public function defineProperties()
    {
        return [
             'questionNumber' => [
             'title'             => 'Number of Questions',
             'description'       => 'Show X last questions',
             'default'           => 5,
             'type'              => 'string',
             'validationPattern' => '^[0-9]+$',
             'validationMessage' => 'The Question number property can contain only numeric symbols'
            ]
        ];
    }
     public function onRun()
    {
        $this->faqs = Question::whereIsApproved('1')
                        ->orderBy('id', 'desc')
                        ->with('category')
                        ->take($this->property['questionNumber'])
                        ->get();
    }


}