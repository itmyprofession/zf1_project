<?php

/**
 * User Entity
 * 
 * @category model
 * @author Santosh Moktan <itmyprofession@gmail.com>
 * @copyright (c) 2013
 */
class User_Model_User
{

    protected $_email;
    protected $_firstname;
    protected $_lastname;
    protected $_address;
    protected $_phone;
    protected $_country;
    protected $_id;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getFirstname()
    {
        return $this->_firstname;
    }

    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->_lastname;
    }

    public function setLastname($lastname)
    {
        $this->_lastname = $lastname;
    }

    public function getAddress()
    {
        return $this->_address;
    }

    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function setCountry($country)
    {
        $this->_country = $country;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

}