<?php
namespace Loja\V1\Rest\Client;

class ClientEntity
{
	public $id;

	public $name;

	public $email;

	public function getArrayCopy()
	{
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
		);
	}

	public function exchangeArray(array $array)
	{
		$this->id = $array['id'];
		$this->name = $array['name'];
		$this->email = $array['email'];
	}
}
