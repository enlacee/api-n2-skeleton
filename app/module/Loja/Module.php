<?php
namespace Loja;

use Laminas\ApiTools\Provider\ApiToolsProviderInterface;

use Loja\V1\Rest\Client\ClientMapper;
use Loja\V1\Rest\Album\AlbumMapper;
use Loja\V1\Rest\Client\ClientEntity;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;


class Module implements ApiToolsProviderInterface
{
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return [
			'Laminas\ApiTools\Autoloader' => [
				'namespaces' => [
					__NAMESPACE__ => __DIR__ . '/src',
				],
			],
		];
	}

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'LojaClienteTableGateway' => function($sm){
					$dbAdapter = $sm->get('DB\Cliente');

					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new ClientEntity());

					return new TableGateway('client', $dbAdapter, null, $resultSetPrototype);
				},
				'Loja\V1\Rest\Client\ClientMapper' => function($sm) {
					$tableGateway = $sm->get('LojaClienteTableGateway');

					return new ClientMapper($tableGateway);
				},
				'Loja\V1\Rest\Album\AlbumMapper' => function($sm) {
					// var_dump(new AlbumMapper());exit;
					$adapter = $sm->get('DB\Cliente');
					return new AlbumMapper($adapter);
				}
			)
		);
	}
}
