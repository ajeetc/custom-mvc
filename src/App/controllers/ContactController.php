<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Paths;
use Framework\TemplateEngine;

class ContactController
{
    public TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    public function index()
    {
        echo $this->view->render('contact.php', [
            'title' => 'Contact us testing'
        ]);
    }
}
