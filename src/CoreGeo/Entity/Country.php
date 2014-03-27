<?php

namespace CoreGeo\Entity;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator;
use CoreApplication\Validator\SystemName;
use CoreApplication\Entity\IdTrait;
use CoreApplication\Entity\SortOrderTrait;

class Country implements InputFilterAwareInterface
{
    use IdTrait;
    use SortOrderTrait;

    /** @var int */
    private $_statusId;

    /** @var string */
    private $_name;

    /** @var string */
    private $_title;

    /** @var InputFilter */
    private $_inputFilter;

    /**
     * @param string $_name
     */
    public function setName($_name)
    {
        $this->_name = $_name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param int $_statusId
     */
    public function setStatusId($_statusId)
    {
        $this->_statusId = $_statusId;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return $this->_statusId;
    }

    /**
     * @param string $_title
     */
    public function setTitle($_title)
    {
        $this->_title = $_title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    public function isPublished()
    {
        return (bool) $this->getStatusId();
    }

    /**
     * Especially for form hydration
     *
     * @param bool $_isPublished
     */
    public function setIsPublished($_isPublished)
    {
        $this->setStatusId((bool) $_isPublished ? 1 : 0);
    }

    /**
     * Set input filter
     *
     * @param InputFilterInterface $_inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $_inputFilter)
    {
        $this->_inputFilter = $_inputFilter;
    }

    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if (null == $this->_inputFilter) {
            $filter = new InputFilter();

            $input = new Input('title');
            $input->getValidatorChain()->attach(new Validator\NotEmpty());
            $filter->add($input);

            $input = new Input('name');
            $filter->add($input);

            $input->getValidatorChain()
                  ->attach(new Validator\NotEmpty())
                  ->attach(new SystemName());

            $this->setInputFilter($filter);
        }

        return $this->_inputFilter;
    }
}
