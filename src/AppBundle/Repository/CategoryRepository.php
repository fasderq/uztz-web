<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    /**
     * @return array | Category[]
     */
    public function getCategories(): array
    {
        return $this->createQueryBuilder('category')
            ->leftJoin('category.machines', 'machines')
            ->addSelect('machines')
            ->getQuery()
            ->getResult() ?? [];
    }

}
