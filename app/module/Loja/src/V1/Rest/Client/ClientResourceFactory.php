<?php
namespace Loja\V1\Rest\Client;

class ClientResourceFactory
{
    public function __invoke($services)
    {
    	$mapper = $services->get('Loja\V1\Rest\Client\ClientMapper');
        return new ClientResource($mapper);
    }
}
