<?php namespace RedMarlin\Faq\Components;

use Cms\Classes\ComponentBase;
use RedMarlin\Faq\Models\Question;
use System\Models\MailSetting as MailSettings;
use Flash;
use Event;
use Request;
use Validator;
use Html;
use Mail;

class FaqAsk extends ComponentBase
{
    public $faqs;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQ Ask a Question',
            'description' => 'Displays "Ask a question" form'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
     public function onPost()
    {
    
    $question = Html::clean(post('question'));
    $reply_email = post('email');
    
    $validator = Validator::make(
        [
            'question' => $question,
            'reply_email' => $reply_email
        ],
        [
            
            'question' => 'required',
            'reply_email' => 'email'
        ]
    );
    if ($validator->fails())
    {
        Flash::error('Please enter the question'); 
    }
    else {
        $ask = new Question;
        $ask->question = $question;

        /**
        * Saving question in DB
        **/
        $ask->is_approved = '0';
        $ask->category_id = '0';
        $ask->reply_email = $reply_email;
        $ask->save();

        /**
        * Sending email to admin
        **/
        $params = compact('question');
        Mail::send('redmarlin.faq::mail.asked',$params, function ($message) {
            $message->to(MailSettings::get('sender_email'));
            $email = post('email');
        });
        Flash::success('Your question was received correctly.');
    }
}

        



}
