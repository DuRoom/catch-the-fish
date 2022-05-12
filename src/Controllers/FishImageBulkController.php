<?php

namespace DuRoom\CatchTheFish\Controllers;

use DuRoom\CatchTheFish\Repositories\FishRepository;
use DuRoom\CatchTheFish\Repositories\RoundRepository;
use DuRoom\CatchTheFish\Serializers\FishSerializer;
use DuRoom\Api\Controller\AbstractListController;
use DuRoom\Http\RequestUtil;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FishImageBulkController extends AbstractListController
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

        $files = array_filter($request->getUploadedFiles(), function (string $key) {
            return Str::startsWith($key, 'image');
        }, ARRAY_FILTER_USE_KEY);

        return $this->fishes->bulkImageImport($round, $files);
    }
}
