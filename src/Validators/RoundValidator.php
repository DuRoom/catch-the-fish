<?php

namespace DuRoom\CatchTheFish\Validators;

use DuRoom\Foundation\AbstractValidator;

class RoundValidator extends AbstractValidator
{
    protected $rules = [
        'name' => 'required|string',
        'starts_at' => 'nullable|date',
        'ends_at' => 'required|date',
    ];
}
