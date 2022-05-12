<?php

namespace DuRoom\CatchTheFish\Providers;

use DuRoom\CatchTheFish\Repositories\FishImageUploader;
use DuRoom\Foundation\AbstractServiceProvider;
use DuRoom\Foundation\Paths;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemInterface;

class StorageServiceProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->container->bind('catchthefish-assets', function () {
            return new Filesystem(new Local($this->container->make(Paths::class)->public . '/assets/catch-the-fish'));
        });

        $this->container->when(FishImageUploader::class)
            ->needs(FilesystemInterface::class)
            ->give('catchthefish-assets');
    }
}
