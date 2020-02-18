<?php
namespace Loja\V1\Rest\Album;

class AlbumResourceFactory
{
	public function __invoke($services)
	{
		$mapper = $services->get('Loja\V1\Rest\Album\AlbumMapper');
		return new AlbumResource($mapper);
	}
}
