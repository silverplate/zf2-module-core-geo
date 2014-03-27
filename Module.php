<?php

namespace CoreGeo;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                __NAMESPACE__ . '\Mapper\Country' =>
                    __NAMESPACE__ . '\Mapper\Country',
                __NAMESPACE__ . '\Mapper\City' =>
                    __NAMESPACE__ . '\Mapper\City',
            ),
            'factories' => array(
                __NAMESPACE__ . '\Form\City' => function($_sm) {
                    return new Form\City($_sm);
                }
            ),
        );
    }
}
