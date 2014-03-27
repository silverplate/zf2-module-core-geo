<?php

namespace CoreGeo\Form;

use Zend\Form\Element;
use CoreControl\Form\AbstractForm;

class Country extends AbstractForm
{
    public function createElements()
    {
        $ele = new Element\Text('title');
        $ele->setLabel('Название');
        $this->add($ele);

        $ele = new Element\Text('name');
        $ele->setLabel('Служебное имя');
        $ele->setAttribute('descr', 'По-английски');
        $this->add($ele);

        $ele = new Element\Checkbox('is_published');
        $ele->setLabel('Показывать');
        $this->add($ele);
    }
}
