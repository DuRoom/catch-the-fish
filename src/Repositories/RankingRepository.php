<?php

namespace DuRoom\CatchTheFish\Repositories;

use DuRoom\CatchTheFish\Round;

class RankingRepository
{
    public function all(Round $round)
    {
        return $round->rankings()
            ->orderBy('catch_count', 'desc')
            ->get();
    }
}
