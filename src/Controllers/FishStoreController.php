<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\FishRepository;
use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Serializers\FishSerializer;
use DuRoom\Api\Controller\AbstractCreateController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FishStoreController extends AbstractCreateController
{
    public $serializer = FishSerializer::class;

    protected $rounds;
    protected $fishes;

    public function __construct(RoundRepository $rounds, FishRepository $fishes)
    {
        $this->rounds = $rounds;
        $this->fishes = $fishes;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $roundId = Arr::get($request->getQueryParams(), 'id');

        $round = $this->rounds->findOrFail($roundId);

        RequestUtil::getActor($request)->assertCan('createFish', $round);

        $attributes = Arr::get($request->getParsedBody(), 'data.attributes', []);

        return $this->fishes->store($round, $attributes);
    }
}
