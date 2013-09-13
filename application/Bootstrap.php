<?php

/**
 * Bootstrap
 * 
 * @author Santosh Moktan <itmyprofession@gmail.com>
 * @copyright (c) 2013
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Initialize DocType for application
     */
    protected function _initDocType()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    /**
     * Intiailize routes
     */
    protected function _initRoute()
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');

        // Show list of users
        $front->getRouter()->addRoute('users', new Zend_Controller_Router_Route(
                'users', array(
            'action' => 'index',
            'controller' => 'index',
            'module' => 'user'
        )));
        
        // Show user registration
        $front->getRouter()->addRoute('register', new Zend_Controller_Router_Route(
                'register', array(
            'action' => 'register',
            'controller' => 'index',
            'module' => 'user'
        )));
    }

}

