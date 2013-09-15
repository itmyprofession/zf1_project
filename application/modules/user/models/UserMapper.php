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
        if (($id = $user->getId()) != 0 && $id != '') {
            return $this->getDbTable()->update($data, 'id=' . $id);
        } else {
            return $this->getDbTable()->insert($data);
        }
    }

    /**
     * Delete user
     * 
     * @param type $id
     */
    public function delete($id)
    {
        return $this->getDbTable()->delete('id=' . $id);
    }

    /**
     * Fetch all the users
     * 
     * @return \User_Model_User
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $users = array();
        foreach ($resultSet as $row) {
            $user = new User_Model_User();
            $user->setId($row->id)
                    ->setEmail($row->email)
                    ->setFirstname($row->firstname)
                    ->setLastname($row->lastname)
                    ->setAddress($row->address)
                    ->setPhone($row->phone);
            $users[] = $user;
        }
        return $users;
    }

    /**
     * Find user by id
     * 
     * @param type $id
     * @return type
     * @throws Exception
     * 
     * @return array User data
     */
    public function findUser($id)
    {
        $id = (int) $id;
        $row = $this->getDbTable()->fetchRow('id = ' . $id);

        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

}