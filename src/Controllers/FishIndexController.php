<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\FishRepository;
use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Serializers\FishSerializer;
use DuRoom\Api\Controller\AbstractListController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FishIndexController extends AbstractListController
{
    public $serializer = FishSerializer::class;

    public $include = [
        'lastUserPlacement',
        'lastUserNaming',
        'placement',
        'placement.discussion', // For when it's a post
    ];

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

        RequestUtil::getActor($request)->assertCan('listFishes', $round);

        return $this->fishes->all($round);
    }
}
