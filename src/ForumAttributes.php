<?php

namespace DuRoom\CatchTheFish;

use DuRoom\Api\Serializer\ForumSerializer;
use DuRoom\Settings\SettingsRepositoryInterface;

class ForumAttributes
{
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function __invoke(ForumSerializer $serializer): array
    {
        return [
            'catchTheFishCanModerate' => $serializer->getActor()->can('catchthefish.moderate'),
            'catchTheFishCanSeeRankingsPage' => $serializer->getActor()->can('catchthefish.list-rankings'),
            'catchTheFishAlertRound' => $this->settings->get('catch-the-fish.alertRound') !== '0',
            'catchTheFishAnimateFlip' => $this->settings->get('catch-the-fish.animateFlip') !== '0',
        ];
    }
}
