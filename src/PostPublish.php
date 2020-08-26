<?php


namespace App;

use Symfony\Component\DependencyInjection\ServiceLocator;

class PostPublish
{
    private $criteria;

    public function __construct(ServiceLocator $criteria)
    {
        $this->criteria = $criteria;
    }

    public function supports()
    {
        dump($this->criteria->getProvidedServices());
    }

    protected function voteOnAttribute()
    {
        /** @var CriterionInterface $criterion */
        $t= $this->criteria->get(CanView::class);
        dump($t);

        throw new \LogicException('This code should not be reached!');
    }
}
