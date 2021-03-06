<?php

namespace DuRoom\CatchTheFish\Serializers;

use DuRoom\CatchTheFish\Ranking;
use DuRoom\Api\Serializer\AbstractSerializer;
use DuRoom\Api\Serializer\UserSerializer;
use Tobscure\JsonApi\Relationship;

class RankingSerializer extends AbstractSerializer
{
    protected $type = 'catchthefish-rankings';

    /**
     * @param Ranking $ranking
     * @return array
     */
    protected function getDefaultAttributes($ranking): array
    {
        return [
            'catch_count' => $ranking->catch_count,
        ];
    }

    public function user(Ranking $ranking): ?Relationship
    {
        return $this->hasOne($ranking, UserSerializer::class, 'user');
    }
}
