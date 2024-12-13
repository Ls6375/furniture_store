<?php
namespace Controllers;

class BaseController
{
    protected $flashMessages = [];

    public function __construct()
    {
        $this->flashMessages['success'] = getFlash('success');
        $this->flashMessages['errors'] = getFlash('errors');
        $this->flashMessages['old'] = getFlash('old');
    }

    protected function render($viewPath, $data = [])
    {
        // Merge the global flash messages with specific data for this view
        $data = array_merge($data, $this->flashMessages);
        extract($data); // Extract array to variables for use in views
        require_once $viewPath;
    }
}
