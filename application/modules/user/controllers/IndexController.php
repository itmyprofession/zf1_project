<?php

/**
 * IndexController
 * 
 * @module User
 * @category module
 * @author Santosh Moktan <itmyprofession@gmail.com>
 * @copyright (c) 2013, 
 */
class User_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * Show list of users
     */
    public function indexAction()
    {
        // action body
    }

    /**
     * Display user registration form
     */
    public function registerAction()
    {
        // action body
        $request = $this->getRequest();
        $form = new User_Form_Registration();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $userData = new User_Model_User($form->getValues());
                $mapper = new User_Model_UserMapper();
                $mapper->save($userData);
                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
    }

}

