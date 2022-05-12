<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Serializers\RoundSerializer;
use DuRoom\Api\Controller\AbstractShowController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class RoundShowController extends AbstractShowController
{
    public $serializer = RoundSerializer::class;

    protected $rounds;

    public function __construct(RoundRepository $rounds)
    {
        $this->rounds = $rounds;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $id = Arr::get($request->getQueryParams(), 'id');

        $round = $this->rounds->findOrFail($id);

        RequestUtil::getActor($request)->assertCan('view', $round);

        return $round;
    }
}
