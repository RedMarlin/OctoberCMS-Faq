<?php return [
    'plugin' => [
        'name' => 'Faq interactive',
        'description' => 'Plugin Faq interactive qui permet à vos utilisateurs de poser des questions directement depuis votre page web.',
    ],
    'common' => [
        'date' => 'Date',
        'faq' => 'FAQ',
        'question' => 'Question',
        'questions' => 'Questions',
        'category' => 'Catégorie',
        'categories' => 'Catégories',
    ],
    'question' => [
        'approved' => 'Publique',
        'is_approved' => 'Est publique?',
        'is_approved_comment' => 'Rendre cette question visible sur le site',
        'featured' => 'En vedette',
        'is_featured' => 'Est en vedette ?',
        'is_featured_comment' => 'Mettre cette question en avant',
        'question_comment' => 'Editer la question ici',
        'answer' => 'Réponse',
        'answer_comment' => 'Editer la réponse ici',
        'created_at' => 'Date de création',
        'created_at_comment' => 'Quand la question a été créée',
        'reply_email' => 'Courriel de notification',
    ],
    'category' => [
        'category_comment' => 'Modifier le titre de la catégorie',
        'lang' => 'Langue',
        'lang_comment' => 'Langue de la catégorie, facultative (laissez vide si vous utilisez le plugin Rainlab Translate)',
    ],
    'components' => [
        'faqall' => [
            'name' => 'FAQ - Tout afficher',
            'description' => 'Affiche la liste des FAQ de toutes les catégories',
            'limit' => [
                'title' => 'Limite',
                'description' => 'Limiter la liste à X questions',
                'validation' => 'La propriété "Limite" ne peut contenir que des symboles numériques.',
            ]
        ],
        'faqask' => [
            'name' => 'FAQ Poser une question',
            'description' => 'Affiche le formulaire "Posez une question".',
        ],
        'faqfeatured' => [
            'name' => 'FAQ Questions en vedette',
            'description' => 'Affiche les liens vers les questions vedettes',
            'number' => [
                'title' => 'Nombre de questions',
                'description' => 'Afficher X questions en vedette',
                'validation' => 'La propriété "Nombre de questions" ne peut contenir que des symboles numériques.',
            ],
            'hot' => 'Questions populaires',
        ],
        'faqlast' => [
            'name' => 'FAQ Dernières questions',
            'description' => 'Affiche les dernières questions',
            'number' => [
                'title' => 'Nombre de questions',
                'description' => 'Afficher les X dernières questions',
                'validation' => 'La propriété "Nombre de questions" ne peut contenir que des symboles numériques.',
            ],
        ],
        'faqlist' => [
            'name' => 'FAQ par catégorie',
            'description' => 'Affiche la liste des FAQ pour une catégorie donnée',
            'category' => [
                'title' => 'Id de la catégorie',
                'description' => 'Listez toutes les questions de la catégorie donnée',
                'validation' => 'La propriété "Id de la catégorie" ne peut contenir que des symboles numériques.',
            ],
        ],
    ],
    'sorting' => [
        'title' => 'Ordre de tri',
        'description' => 'Choisissez la méthode de tri. Par défaut, les questions les plus récentes en premier',
        'placeholder' => 'Sélectionnez l’ordre de tri',
        'desc' => 'Le plus récent en premier',
        'asc' => 'Le plus ancien d’abord',
        'order' => 'Commande de l’utilisateur',
    ],
    'titles' => [
        'category' => [
            'create' => 'Ajouter une catégorie de FAQ',
            'update' => 'Modifier la catégorie de FAQ',
            'added' => 'La catégorie a été ajoutée correctement.',
            'saved' => 'La catégorie a été mise à jour avec succès !',
            'deleted' => 'La catégorie a été supprimée.',
            'list' => 'Catégories de Faq',
        ],
        'question' => [
            'create' => 'Ajouter une question',
            'update' => 'Modifier la question',
            'redorder' => 'Réorganiser les questions',
            'added' => 'Question ajoutée correctement.',
            'saved' => 'Question mise à jour avec succès !',
            'deleted' => 'La question a été supprimée.',
            'list' => 'Questions de Faq',
        ]
    ],
    'buttons' => [
        'reorder' => 'Réorganiser les questions dans cette catégorie',
        'notify' => 'Notifier la réponse',
        'send' => 'Envoyer',
    ],
    'messages' => [
        'reorder' => 'Redirection vers la page de tri...',
        'notify' => 'Notifier la réponse...',
    ],
    'permissions' => [
        'tab' => 'Faq',
        'label' => 'Accéder et gérer les FAQs',
    ],
];
