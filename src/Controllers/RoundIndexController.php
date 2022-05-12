<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Round;
use DuRoom\CatchTheFish\Serializers\RoundSerializer;
use DuRoom\Api\Controller\AbstractListController;
use DuRoom\Http\RequestUtil;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class RoundIndexController extends AbstractListController
{
    public $serializer = RoundSerializer::class;

    /**
     * @var RoundRepository
     */
    protected $rounds;

    public function __construct(RoundRepository $rounds)
    {
        $this->rounds = $rounds;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        RequestUtil::getActor($request)->assertCan('list', Round::class);

        return $this->rounds->all();
    }
}
