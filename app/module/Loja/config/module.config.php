<?php
return [
    'service_manager' => [
        'factories' => [
            \Loja\V1\Rest\Client\ClientResource::class => \Loja\V1\Rest\Client\ClientResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'loja.rest.client' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/client[/:client_id]',
                    'defaults' => [
                        'controller' => 'Loja\\V1\\Rest\\Client\\Controller',
                    ],
                ],
            ],
            'loja.rest.product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/product[/:product_id]',
                    'defaults' => [
                        'controller' => 'Loja\\V1\\Rest\\Product\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'loja.rest.client',
            1 => 'loja.rest.product',
        ],
    ],
    'api-tools-rest' => [
        'Loja\\V1\\Rest\\Client\\Controller' => [
            'listener' => \Loja\V1\Rest\Client\ClientResource::class,
            'route_name' => 'loja.rest.client',
            'route_identifier_name' => 'client_id',
            'collection_name' => 'client',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Loja\V1\Rest\Client\ClientEntity::class,
            'collection_class' => \Loja\V1\Rest\Client\ClientCollection::class,
            'service_name' => 'Client',
        ],
        'Loja\\V1\\Rest\\Product\\Controller' => [
            'listener' => 'Loja\\V1\\Rest\\Product\\ProductResource',
            'route_name' => 'loja.rest.product',
            'route_identifier_name' => 'product_id',
            'collection_name' => 'product',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Loja\V1\Rest\Product\ProductEntity::class,
            'collection_class' => \Loja\V1\Rest\Product\ProductCollection::class,
            'service_name' => 'product',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Loja\\V1\\Rest\\Client\\Controller' => 'HalJson',
            'Loja\\V1\\Rest\\Product\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Loja\\V1\\Rest\\Client\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Loja\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Loja\\V1\\Rest\\Client\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/json',
            ],
            'Loja\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Loja\V1\Rest\Client\ClientEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.client',
                'route_identifier_name' => 'client_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \Loja\V1\Rest\Client\ClientCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.client',
                'route_identifier_name' => 'client_id',
                'is_collection' => true,
            ],
            \Loja\V1\Rest\Product\ProductEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.product',
                'route_identifier_name' => 'product_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \Loja\V1\Rest\Product\ProductCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.product',
                'route_identifier_name' => 'product_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            'Loja\\V1\\Rest\\Product\\ProductResource' => [
                'adapter_name' => 'DB\\Cliente',
                'table_name' => 'product',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Loja\\V1\\Rest\\Product\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Loja\\V1\\Rest\\Product\\Controller' => [
            'input_filter' => 'Loja\\V1\\Rest\\Product\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Loja\\V1\\Rest\\Productos\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'price',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '10',
                        ],
                    ],
                ],
            ],
        ],
        'Loja\\V1\\Rest\\Product\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'price',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '10',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
