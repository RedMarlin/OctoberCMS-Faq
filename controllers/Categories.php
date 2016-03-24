<?php namespace RedMarlin\Faq\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use ApplicationException;
use RedMarlin\Faq\Models\Category;
use Backend;

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

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $postId) {
                if (!$post = Category::find($postId))
                    continue;
                $post->delete();
            }
            Flash::success('Category Deleted', ['name' => 'Category']);
        }
        return $this->listRefresh();
    }
    /**
    *   When clicked on sort button, redirect to sort url with category filter.
    **/
     public function onLinkSort($recordId = null)
    {
        $url = Backend::url('redmarlin/faq/questions/reorder');
        return Redirect::to($url.'/'.$recordId);
    }
    
    
   
}
