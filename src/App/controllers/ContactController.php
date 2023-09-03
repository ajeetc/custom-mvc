<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class ContactController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function index()
    {
        echo $this->view->render('contact.php', [
            'title' => 'Contact us testing'
        ]);
    }
}
