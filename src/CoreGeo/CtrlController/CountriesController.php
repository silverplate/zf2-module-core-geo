<?php

namespace CoreGeo\CtrlController;

use Control\Controller\AbstractController;
use CoreControl\Controller\SimpleFormTrait;
use CoreControl\Controller\SortTrait;
use CoreGeo\Form\Country as Form;

class CountriesController extends AbstractController
{
    use SortTrait;
    use SimpleFormTrait;

    protected $_route = 'ctrl-geo-countries';
    protected $_title = 'Страны';

    protected function _getMapper()
    {
        return $this->_srv('\CoreGeo\Mapper\Country');
    }

    protected function _createForm()
    {
        return new Form(null, $this->ent());
    }
}
