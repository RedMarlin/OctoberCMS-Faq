<?php namespace REDMARLIN\Faq\Components;

use Cms\Classes\ComponentBase;
use REDMARLIN\Faq\Models\Question;
use System\Models\MailSettings as MailSettings;
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
    # Collect input
    $question = Html::clean(post('question'));
    $bot = post('email2');
    $reply_email = post('email');
    
    # Form Validation
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
    elseif ( !empty($bot)) {
        Flash::error('Please dont fill this field.'); 
    }
    else {
        $ask = new Question;
        $ask->question = $question;

        $ask->is_approved = '0';
        $ask->category_id = '0';
        $ask->reply_email = $reply_email;
        $ask->save();

        $params = compact('question');
        Mail::send('faq::mail.asked',$params, function ($message) {
            $message->to(MailSettings::get('sender_email'));
            $email = post('email');
        });
        Flash::success('Your question was received correctly.');
    }
}

        



}
