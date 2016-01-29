<?php namespace RedMarlin\Faq\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use ApplicationException;
use RedMarlin\Faq\Models\Category;

class Categories extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',

    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['redmarlin.faq.access_faq'];

     public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('RedMarlin.Faq', 'faq', 'categories');
    }
    
   
}