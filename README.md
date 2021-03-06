# API-N2-SKELETON [Laminas](https://api-tools.getlaminas.org/)

Copyright (C) 2020 Nodos \<http://nodos.pe\>


Authors:
--------
- Anibal


Requirements
------------
1. PHP >= 7.1
2. MySQL >= 5.6 or compatible.
3. Extra PHP extensions: `mcrypt`


Write permissions
-----------------
The application requires write permissions on the following directories:

- `data`


## 01 AUTH *HTTP Basic*

Referencia: [HttpBasic](https://api-tools.getlaminas.org/documentation/auth/authentication-http-basic)

Crear archivos con htpasswd Tool: *set user and password* `admin:admin`
Generar el usuario y la contraseña por linea de comando.

	htpasswd -cs data/users.htpasswd admin

Configurar el `config/autoload/local.php`

	<?php
	return [
		'statuslib' => [
			'array_mapper_path' => 'data/statuslib.php',
		],
		'api-tools-mvc-auth' => [
			'authentication' => [
				'adapters' => [
					'status' => [
						'adapter' => \Laminas\ApiTools\MvcAuth\Authentication\HttpAdapter::class,
						'options' => [
							'accept_schemes' => [
								0 => 'basic',
							],
							'realm' => 'api',
							'htpasswd' => 'data/users.htpasswd',
						],
					],
				],
			],
		],
	];

Para generar una authenticación basica por cabecera usar el [Generador Online](https://www.blitter.se/utils/basic-authentication-header-generator/) establecer el usario y clave que fueron creados `admin:admin`.

Utilizar el servicio creado `http://localhost:8080/status`

	POST /status HTTP/1.1
	Accept: application/json
	Content-Type: application/json
	Authorization: Basic YWRtaW46YWRtaW4=
	{
		"message": "First post!2",
		"user": "andi"
	}
