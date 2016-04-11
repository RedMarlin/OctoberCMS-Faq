<?php namespace RedMarlin\Faq\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use ApplicationException;
use RedMarlin\Faq\Models\Question;
use Mail;
use Request;

class Questions extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',

    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = ['redmarlin.faq.access_faq'];

     public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('RedMarlin.Faq', 'faq', 'questions');
    }
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $postId) {
                if (!$post = Question::find($postId))
                    continue;
                $post->delete();
            }
            Flash::success('Question Deleted', ['name' => 'Question']);
        }
        return $this->listRefresh();
    }
    /**
    * Sends Notify email when admin clicks the Notify Button
    **/
    public function onNotify($recordId = null)
    {
        $model = $this->formFindModelObject($recordId);
        if (filter_var($model->reply_email, FILTER_VALIDATE_EMAIL)){
            $reply_email = $model->reply_email;
            $question = $model->question;
            $answer = $model->answer;
            $questionid = $recordId;
            $params = compact('question','answer','questionid');
        
            Mail::send('redmarlin.faq::mail.replied',$params, function ($message) use ($reply_email) {
                    $message->to($reply_email);
                });
            
            /**
            * After notification is send mail is removed.
            **/
            $model->reply_email = "";
            $model->save();
            Flash::success('Notification send sucessfully to: ' .$reply_email);
            
            if ($redirect = $this->makeRedirect('update', $model)) {
                return $redirect;
            }
        }
        else { Flash::error('Invalid Email for notification.'); }

    }
    /**
    * Show only Questions form given category for reordering
    **/
    public function reorderExtendQuery($query)
    {
        $segment = Request::segment(6);
         if (filter_var($segment, FILTER_VALIDATE_INT)){
            $query->where('category_id', $segment);
        }
          
    }
    
   
}
