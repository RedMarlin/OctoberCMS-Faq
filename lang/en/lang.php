<?php return [
    'plugin' => [
        'name' => 'Interactive Faq',
        'description' => 'Interactive Faq Plugin that allows your users ask questions directly from your webpage.',
    ],
    'common' => [
        'date' => 'Date',
        'faq' => 'FAQ',
        'question' => 'Question',
        'questions' => 'Questions',
        'category' => 'Category',
        'categories' => 'Categories',
    ],
    'question' => [
        'approved' => 'Public',
        'is_approved' => 'Is Public?',
        'is_approved_comment' => 'Make this Question visible on the site',
        'featured' => 'Featured',
        'is_featured' => 'Is Featured?',
        'is_featured_comment' => 'Make this Question Featured',
        'question_comment' => 'Edit question here',
        'answer' => 'Answer',
        'answer_comment' => 'Edit answer here',
        'created_at' => 'Creation Date',
        'created_at_comment' => 'When the Question was created',
        'reply_email' => 'Notification Email',
    ],
    'category' => [
        'category_comment' => 'Edit Category Title',
        'lang' => 'Language',
        'lang_comment' => 'Optional category language (leave empty if you use Rainlab Translate plugin)',
        'featured' => 'Featured',
        'is_featured' => 'Is Featured?',
        'is_featured_comment' => 'Make this Question Featured',
        'answer' => 'Answer',
        'answer_comment' => 'Edit answer here',
        'created_at' => 'Creation Date',
        'created_at_comment' => 'When the Question was created',
        'reply_email' => 'Notification Email',
    ],
    'components' => [
        'faqall' => [
            'name' => 'FAQ - Display All',
            'description' => 'Displays list of FAQs from all categories',
            'limit' => [
                'title' => 'Limit',
                'description' => 'Limit list to X questions',
                'validation' => 'The Limit property can contain only numeric symbols',
            ]
        ],
        'faqask' => [
            'name' => 'FAQ Ask a Question',
            'description' => 'Displays "Ask a question" form',
        ],
        'faqfeatured' => [
            'name' => 'FAQ Featured Questions',
            'description' => 'Displays featured questions links',
            'number' => [
                'title' => 'Number of Questions',
                'description' => 'Show X Featured Questions',
                'validation' => 'The Question Number property can contain only numeric symbols',
            ],
            'hot' => 'Hot Questions',
        ],
        'faqlast' => [
            'name' => 'FAQ Latest Questions',
            'description' => 'Displays latest questions',
            'number' => [
                'title' => 'Number of Questions',
                'description' => 'Show X last Questions',
                'validation' => 'The Question Number property can contain only numeric symbols',
            ],
        ],
        'faqlist' => [
            'name' => 'FAQ by Category',
            'description' => 'Displays list of FAQs for given category',
            'category' => [
                'title' => 'Category id',
                'description' => 'List all questions from given category',
                'validation' => 'The Category id property can contain only numeric symbols',
            ],
        ],
    ],
    'sorting' => [
        'title' => 'Sort Order',
        'description' => 'Choose sort ordering method. Default newest questions first',
        'placeholder' => 'Select sort order',
        'desc' => 'Newest first',
        'asc' => 'Oldest first',
        'order' => 'User order',
    ],
    'titles' => [
        'category' => [
            'create' => 'Add category',
            'update' => 'Edit category',
            'added' => 'Category added correctly.',
            'saved' => 'Category updated successfully!',
            'deleted' => 'Category has been deleted.',
            'list' => 'Faq Categories',
        ],
        'question' => [
            'create' => 'Add Question',
            'update' => 'Edit question',
            'redorder' => 'Reorder Questions',
            'added' => 'Question added correctly.',
            'saved' => 'Question updated successfully!',
            'deleted' => 'Question has been deleted.',
            'list' => 'Faq Questions',
        ]
    ],
    'buttons' => [
        'reorder' => 'Reorder Questions in this category',
        'notify' => 'Notify about answer',
        'send' => 'Send',
    ],
    'messages' => [
        'reorder' => 'Redirecting to sorting page...',
        'notify' => 'Notifying about answer...',
        'question_error' => 'Please enter the question',
        'question_received' => 'Your question was received correctly.',
    ],
    'permissions' => [
        'tab' => 'Faq',
        'label' => 'Access and manage Faq',
    ],
];
