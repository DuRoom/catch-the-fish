<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Round;
use DuRoom\CatchTheFish\Serializers\RoundSerializer;
use DuRoom\Api\Controller\AbstractCreateController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class RoundStoreController extends AbstractCreateController
{
    public $serializer = RoundSerializer::class;

    protected $rounds;

    public function __construct(RoundRepository $rounds)
    {
        $this->rounds = $rounds;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        RequestUtil::getActor($request)->assertCan('create', Round::class);

        $attributes = Arr::get($request->getParsedBody(), 'data.attributes', []);

        return $this->rounds->store($attributes);
    }
}
