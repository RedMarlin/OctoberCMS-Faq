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
            'name'        => 'redmarlin.faq::lang.plugin.name',
            'description' => 'redmarlin.faq::lang.plugin.description',
            'author'      => 'RedMarlin',
            'icon'        => 'icon-comments'
        ];
    }

    public function registerComponents()
    {
        return [
            'RedMarlin\Faq\Components\FaqList' => 'FaqList',
            'RedMarlin\Faq\Components\FaqAsk' => 'FaqAsk',
            'RedMarlin\Faq\Components\FaqLast' => 'FaqLast',
            'RedMarlin\Faq\Components\FaqFeatured' => 'FaqFeatured',
            'RedMarlin\Faq\Components\FaqAll' => 'FaqAll',
        ];
    }

    public function registerPermissions()
    {
        return [
            'redmarlin.faq.access_faq' => [
                'tab' => 'redmarlin.faq::lang.permissions.tab',
                'label' => 'redmarlin.faq::lang.permissions.label'
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
                'label'       => 'redmarlin.faq::lang.common.faq',
                'url'         => Backend::url('redmarlin/faq/questions'),
                'icon'        => 'icon-comments',
                'permissions' => ['redmarlin.faq.*'],

                'sideMenu'    => [
                    'questions' => [
                            'label' => 'redmarlin.faq::lang.common.questions',
                            'icon'        => 'icon-question-circle',
                            'url'         => Backend::url('redmarlin/faq/questions'),
                            'permissions' => ['redmarlin.faq.*']

                    ],
                    'categories' => [
                            'label' => 'redmarlin.faq::lang.common.categories',
                            'icon'        => 'icon-list-ul',
                            'url'         => Backend::url('redmarlin/faq/categories'),
                            'permissions' => ['redmarlin.faq.*']
                    ]
                ]
            ]
        ];
    }
}
