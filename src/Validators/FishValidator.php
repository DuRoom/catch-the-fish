<?php

namespace DuRoom\CatchTheFish\Validators;

use DuRoom\Foundation\AbstractValidator;

class FishValidator extends AbstractValidator
{
    protected $rules = [
        'name' => 'required|string|min:3',
    ];
}
