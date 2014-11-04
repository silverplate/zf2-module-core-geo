<?php

namespace CoreGeo\CtrlController;

use Control\Controller\AbstractController;
use CoreControl\Controller\SimpleFormTrait;
use CoreControl\Controller\SortTrait;

class CitiesController extends AbstractController
{
    use SortTrait;
    use SimpleFormTrait;

    protected $_route = 'ctrl-geo-cities';
    protected $_title = 'Города';

    protected function _getMapper()
    {
        return $this->_srv('\CoreGeo\Mapper\City');
    }

    protected function _createForm()
    {
        $form = $this->_srv('\CoreGeo\Form\City');
        $form->bind($this->ent());

        return $form;
    }
}
