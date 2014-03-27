<?php

namespace CoreGeo\Form;

use Zend\Form\Element;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use CoreControl\Form\AbstractForm;

class City extends AbstractForm implements ServiceLocatorAwareInterface
{
    /** @var ServiceLocatorInterface */
    protected $_serviceLocator;

    public function getServiceLocator()
    {
        return $this->_serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $_serviceLocator)
    {
        $this->_serviceLocator = $_serviceLocator;
    }

    /**
     * @param ServiceManager $_sm
     */
    public function __construct(ServiceManager $_sm)
    {
        parent::__construct();
        $this->setServiceLocator($_sm);
        $this->addCountries();
    }

    public function createElements()
    {
        $ele = new Element\Text('title');
        $ele->setLabel('Название');
        $this->add($ele);

        $ele = new Element\Text('name');
        $ele->setLabel('Служебное имя');
        $ele->setAttribute('descr', 'По-английски');
        $this->add($ele);

        $ele = new Element\Select('country_id');
        $ele->setLabel('Страна');
        $this->add($ele);

        $ele = new Element\Checkbox('is_published');
        $ele->setLabel('Показывать');
        $this->add($ele);
    }

    public function addCountries()
    {
        $mapper = $this->getServiceLocator()->get('\CoreGeo\Mapper\Country');

        /** @var \CoreGeo\Entity\Country[] $entities */
        $entities = $mapper->getList();

        $options = array();
        foreach ($entities as $entity) {
            $options[$entity->getId()] = $entity->getTitle();
        }

        $this->get('country_id')->setValueOptions($options);
    }
}
