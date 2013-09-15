<?php

/**
 * User_Service_UserService
 *
 * @author moktan
 */
class User_Service_UserService
{

    /**
     * List of users with pagination
     * 
     * @param type $page
     * @param type $numberPerPage
     */
    public function getUsers($page, $numberPerPage = 25)
    {
        $user = new User_Model_UserMapper();
        $users = Zend_Paginator::factory($user->fetchAll());
        $users->setCurrentPageNumber($page);
        $users->setItemCountPerPage($numberPerPage);
        return $users;
    }

}
