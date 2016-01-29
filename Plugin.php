<?php namespace RedMarlin\Faq;

use Backend;
use System\Classes\PluginBase;

/**
 * Faq Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Faq',
            'description' => 'Faq module',
            'author'      => 'RedMarlin',
            'icon'        => 'icon-question-circle'
        ];
    }
    
    public function registerComponents(){
    return [
            'RedMarlin\Faq\Components\FaqList' => 'FaqList',
            'RedMarlin\Faq\Components\FaqAsk' => 'FaqAsk',
            'RedMarlin\Faq\Components\FaqLast' => 'FaqLast',
            'RedMarlin\Faq\Components\FaqFeatured' => 'FaqFeatured',
    ];
    }
    
    public function registerPermissions()
    {
        return [
            'redmarlin.faq.access_faq' => [
                'tab' => 'Faq',
                'label' => 'Access and manage Faq'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'faq' => [
                'label'       => 'FAQ',
                'url'         => Backend::url('redmarlin/faq/faq'),
                'icon'        => 'icon-question-circle',
                'permissions' => ['redmarlin.faq.*'],

                'sideMenu'    => [
                    'question' => [
                            'label' => 'Questions',
                            'icon'        => 'icon-question-circle',
                            'url'         => Backend::url('redmarlin/faq/faq'),
                            'permissions' => ['redmarlin.faq.*']

                    ],
                    'category' => [
                            'label' => 'Categories',
                            'icon'        => 'icon-list-ul',
                            'url'         => Backend::url('redmarlin/faq/categories'),
                            'permissions' => ['redmarlin.faq.*']
                    ]
                ]
            ]
        ];
    }


}
