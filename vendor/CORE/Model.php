<?php

namespace CORE;

abstract class Model
{
    public array $attributes = [];
    public array $modelerrors = [];
    public array $rules = [];
    public array $labels = [];

    public function __construct()
    {
        Database::getInstance();
    }
}