<?php


namespace  App;


class CanView implements CriterionInterface
{
    /**
     * @var CanEdit
     */
    private $canEdit;

    public function __construct(CanEdit $canEdit)
    {
        $this->canEdit = $canEdit;
    }

    public function handle(): bool
    {
            return true;
    }

}
