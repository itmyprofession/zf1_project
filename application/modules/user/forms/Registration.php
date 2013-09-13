<?php

class User_Form_Registration extends Zend_Form
{

    public $elementDecorators = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
        array('Label', array('tag' => 'p', 'class' => 'control-label')),
        array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'control-group')),
    );
    public $buttonDecorators = array(
        'ViewHelper',
        array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
        array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'control-group')),
    );

    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class', 'form-horizontal');

        $this->addElement('text', 'email', array(
            'decorators' => $this->elementDecorators,
            'label' => 'Email:',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        $this->addElement('text', 'firstname', array(
            'decorators' => $this->elementDecorators,
            'label' => 'First Name:',
            'required' => true,
            'filters' => array('StringTrim')
        ));
        $this->addElement('text', 'lastname', array(
            'decorators' => $this->elementDecorators,
            'label' => 'Last Name:',
            'required' => true,
            'filters' => array('StringTrim')
        ));

        $this->addElement('text', 'address', array(
            'decorators' => $this->elementDecorators,
            'label' => 'Address:',
            'required' => true,
            'filters' => array('StringTrim')
        ));
        $this->addElement('text', 'phone', array(
            'decorators' => $this->elementDecorators,
            'label' => 'Phone:',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                'Digits',
            )
        ));

        $this->addElement('submit', 'save', array(
            'decorators' => $this->buttonDecorators,
            'label' => 'Register',
            'class' => 'btn btn-large'
        ));
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'td ')),
            'Form',
        ));
    }

}