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
             'title'             => 'Category',
             'description'       => 'List questions from which category',
             'default'           => 1,
             'type'              => 'string',
             'validationPattern' => '^[0-9]+$',
             'validationMessage' => 'The Category id property can contain only numeric symbols'
            ]
        ];
    }
     public function onRun()
    {
        $this->faqs= Question::whereIsApproved('1')
                    ->where('category_id', $this->property('categoryId'))
                    ->orderBy('id', 'desc')
                    ->with('category')
                    ->get();

        $this->page['category'] = Category::where('id', $this->property('categoryId'))->pluck('title');

    }


}