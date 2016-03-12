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
            'name'        => 'Interactive Faq',
            'description' => 'Interactive Faq Plugin that allows your users ask questions directly from your webpage.',
            'author'      => 'RedMarlin',
            'icon'        => 'icon-comments'
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
    public function registerMailTemplates()
    {
        return [
            'redmarlin.faq::mail.replied' => 'User notification about question being answered',
            'redmarlin.faq::mail.asked'  => 'Notification about new question being asked'
        ];
    }
    public function registerNavigation()
    {
        return [
            'faq' => [
                'label'       => 'FAQ',
                'url'         => Backend::url('redmarlin/faq/questions'),
                'icon'        => 'icon-comments',
                'permissions' => ['redmarlin.faq.*'],

                'sideMenu'    => [
                    'questions' => [
                            'label' => 'Questions',
                            'icon'        => 'icon-question-circle',
                            'url'         => Backend::url('redmarlin/faq/questions'),
                            'permissions' => ['redmarlin.faq.*']

                    ],
                    'categories' => [
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
