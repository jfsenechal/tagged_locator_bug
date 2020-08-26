<?php


namespace App;

class CanEdit implements CriterionInterface
{
    public function handle(): bool
    {
        return true;
    }
}
