<?php

namespace DuRoom\CatchTheFish;

use Carbon\Carbon;
use DuRoom\Database\AbstractModel;
use Illuminate\Database\Eloquent\Builder;

class ConfigureBasketRelationship
{
    public function __invoke(AbstractModel $model)
    {
        return $model->hasMany(Fish::class, 'user_id_last_catch')
            ->whereHas('round', function (Builder $query) {
                $query->activeRound();
            })
            ->where('placement_valid_since', '>', Carbon::now())
            ->orderBy('name');
    }
}
