<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\FishRepository;
use DuRoom\CatchTheFish\Serializers\FishSerializer;
use DuRoom\Api\Controller\AbstractShowController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FishUpdateController extends AbstractShowController
{
    public $serializer = FishSerializer::class;

    protected $fishes;

    public function __construct(FishRepository $fishes)
    {
        $this->fishes = $fishes;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $id = Arr::get($request->getQueryParams(), 'id');

        $fish = $this->fishes->findOrFail($id);

        RequestUtil::getActor($request)->assertCan('update', $fish);

        $attributes = Arr::get($request->getParsedBody(), 'data.attributes', []);

        return $this->fishes->update($fish, $attributes);
    }
}
