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
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'loja.rest.client',
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
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Loja\\V1\\Rest\\Client\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Loja\\V1\\Rest\\Client\\Controller' => [
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
        ],
    ],
];
