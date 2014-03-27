<?php

namespace CoreGeo\CtrlController;

use CoreControl\Controller\AbstractController;
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
        return $this->srv('\CoreGeo\Mapper\City');
    }

    protected function _createForm()
    {
        $form = $this->srv('\CoreGeo\Form\City');
        $form->bind($this->ent());

        return $form;
    }
}
