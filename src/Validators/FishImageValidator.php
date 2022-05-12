<?php

namespace DuRoom\CatchTheFish\Validators;

use DuRoom\Foundation\AbstractValidator;

class FishImageValidator extends AbstractValidator
{
    protected $rules = [
        'image' => 'required|mimes:jpeg,png,bmp,gif|max:2048',
    ];
}
