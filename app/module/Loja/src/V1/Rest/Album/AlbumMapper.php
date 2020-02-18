<?php
namespace Loja\V1\Rest\Album;

use Laminas\Db\Sql\Select;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Paginator\Adapter\DbSelect;

use Loja\V1\Rest\Album\AlbumCollection;

class AlbumMapper
{
	protected $adapter;

	public function __construct(AdapterInterface $adapter)
	{
		$this->adapter = $adapter;
	}

	public function fetchAll()
	{
		$select = new Select('album');
		$paginatorAdapter = new DbSelect($select, $this->adapter);
		$collection = new AlbumCollection($paginatorAdapter);

		return $collection;
	}

	public function fetchOne($id)
	{
		$sql = 'SELECT *FROM album WHERE id= ?';
		$resultSet = $this->adapter->query($sql, array(
			$id
		));

		$data = $resultSet->toArray();
		if (!$data) {
			return false;
		}

		$entity = new AlbumEntity();
		$entity->exchangeArray($data[0]);

		return $entity;
	}
}
