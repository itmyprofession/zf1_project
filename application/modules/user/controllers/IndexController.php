<?php

/**
 * IndexController
 *
 * @module User
 * @category module
 * @author Santosh Moktan <itmyprofession@gmail.com>
 * @copyright (c) 2013, 
 *
 *
 */
class User_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * Show list of users
     *
     *
     */
    public function indexAction()
    {
        $user = new User_Service_UserService();
        $page = $this->_getParam('page', 1);
        $this->view->users = $user->getUsers($page);
    }

    /**
     * Display user registration form
     *
     *
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

                $this->_helper->flashMessenger->addMessage(array('success' => 'User has been successfully saved.'));
                return $this->_helper->redirector('index');
            }
            $this->_helper->flashMessenger->addMessage(array('error' => 'User cannot be saved.'));
        }
        $this->view->form = $form;
    }

    /**
     * Edit user
     */
    public function editAction()
    {
        // action body
        $request = $this->getRequest();
        $form = new User_Form_Registration();
        $form->save->setLabel('Save');
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $userData = new User_Model_User($form->getValues());
                $mapper = new User_Model_UserMapper();
                $mapper->save($userData);

                $this->_helper->flashMessenger->addMessage(array('success' => "User($userData->email) has been successfully updated."));
                return $this->_helper->redirector('index');
            }
            $this->_helper->flashMessenger->addMessage(array('error' => 'User cannot be updated.'));
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $user = new User_Model_UserMapper;
                $form->populate($user->findUser($id));
            }
        }
        $this->view->form = $form;
    }

    /**
     * Delete user
     * 
     * @throws Exception Incase id is not passed
     */
    public function deleteAction()
    {
        $id = $this->_getParam('id');
        if (!$id) {
            throw new Exception('Invalid argument exception');
        }
        $userMapper = new User_Model_UserMapper();
        if ($userMapper->delete($id)) {
            $this->_helper->flashMessenger->addMessage(array('success' => "User has been successfully deleted."));
        } else {
            $this->_helper->flashMessenger->addMessage(array('warning' => "Something weird happened please try again"));
        }
        return $this->_helper->redirector('index');
    }

}

