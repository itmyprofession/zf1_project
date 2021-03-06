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
        $view->headTitle('ZF1 Sample Application');
        $view->headTitle()->setSeparator(' :: ');
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

    protected function _initLoader()
    {
        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->registerNamespace('Noumenal_');
    }

    protected function _initHelper()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->addHelperPath('Noumenal/View/Helper', 'Noumenal_View_Helper');
    }

}

