<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'CoreGeo\CtrlController\Countries' =>
                'CoreGeo\CtrlController\CountriesController',
            'CoreGeo\CtrlController\Cities' =>
                'CoreGeo\CtrlController\CitiesController',
        )
    ),

    'router' => array(
        'routes' => array(
            'ctrl-geo-countries' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/ctrl/geo-countries[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'add|edit|srt',
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'CoreGeo\CtrlController\Countries',
                        'action' => 'index'
                    )
                )
            ),
            'ctrl-geo-cities' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/ctrl/geo-cities[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'add|edit|srt',
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'CoreGeo\CtrlController\Cities',
                        'action' => 'index'
                    )
                )
            ),
        ),
    ),

    'navigation' => array(
        'control' => array(
            array(
                'label' => 'Гео',
                'route' => 'ctrl-geo-countries',
                'pages' => array(
                    array(
                        'label' => 'Страны',
                        'route' => 'ctrl-geo-countries'
                    ),
                    array(
                        'label' => 'Города',
                        'route' => 'ctrl-geo-cities'
                    ),
                )
            )
        )
    )
);
