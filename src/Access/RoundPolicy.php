<?php

namespace DuRoom\CatchTheFish\Access;

use Carbon\Carbon;
use DuRoom\CatchTheFish\Round;
use DuRoom\Foundation\ValidationException;
use DuRoom\Locale\Translator;
use DuRoom\User\Access\AbstractPolicy;
use DuRoom\User\User;

class RoundPolicy extends AbstractPolicy
{
    const TRANSLATION_PREFIX = 'duroom-catch-the-fish.api.';

    public function list(User $actor)
    {
        return $actor->can('catchthefish.moderate');
    }

    public function create(User $actor)
    {
        return $this->list($actor);
    }

    public function update(User $actor, Round $round)
    {
        return $this->create($actor);
    }

    public function delete(User $actor, Round $round)
    {
        return $this->update($actor, $round);
    }

    public function participate(User $actor, Round $round)
    {
        $now = Carbon::now();

        if ($round->starts_at && $round->starts_at->gt($now)) {
            throw new ValidationException([
                'placement' => resolve(Translator::class)->trans(self::TRANSLATION_PREFIX . 'round-not-started'),
            ]);
        }

        if ($round->ends_at->lt($now)) {
            throw new ValidationException([
                'placement' => resolve(Translator::class)->trans(self::TRANSLATION_PREFIX . 'round-finished'),
            ]);
        }

        return $actor->can('catchthefish.participate');
    }

    public function listFishes(User $actor, Round $round)
    {
        return $this->list($actor);
    }

    public function listRankings(User $actor, Round $round)
    {
        return $actor->can('catchthefish.list-rankings');
    }
}
