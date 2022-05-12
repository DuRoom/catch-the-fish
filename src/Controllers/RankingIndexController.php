<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\RankingRepository;
use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Serializers\RankingSerializer;
use DuRoom\Api\Controller\AbstractListController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class RankingIndexController extends AbstractListController
{
    public $serializer = RankingSerializer::class;

    public $include = [
        'user',
    ];

    protected $rounds;
    protected $rankings;

    public function __construct(RoundRepository $rounds, RankingRepository $rankings)
    {
        $this->rounds = $rounds;
        $this->rankings = $rankings;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $roundId = Arr::get($request->getQueryParams(), 'id');

        $round = $this->rounds->findOrFail($roundId);

        RequestUtil::getActor($request)->assertCan('listRankings', $round);

        return $this->rankings->all($round);
    }
}
