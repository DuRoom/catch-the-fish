<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\Api\Controller\AbstractDeleteController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class RoundDeleteController extends AbstractDeleteController
{
    protected $rounds;

    public function __construct(RoundRepository $rounds)
    {
        $this->rounds = $rounds;
    }

    protected function delete(ServerRequestInterface $request)
    {
        $id = Arr::get($request->getQueryParams(), 'id');

        $round = $this->rounds->findOrFail($id);

        RequestUtil::getActor($request)->assertCan('delete', $round);

        $this->rounds->delete($round);
    }
}
