<?php

/**
 * User Mapper
 * 
 * @category model
 * @author Santosh Moktan <itmyprofession@gmail.com>
 * @copyright (c) 2013
 */
class User_Model_UserMapper
{

    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('User_Model_DbTable_User');
        }
        return $this->_dbTable;
    }

    /**
     * Save user data
     * 
     * @param User_Model_User $user
     */
    public function save(User_Model_User $user)
    {
        $data = array(
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'address' => $user->getAddress(),
            'phone' => $user->getPhone(),
            'country' => $user->getCountry()
        );

        return $this->getDbTable()->insert($data);
    }

}