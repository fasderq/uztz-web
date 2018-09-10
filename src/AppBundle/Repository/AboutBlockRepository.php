<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class AboutBlockRepository extends EntityRepository
{
    public function getBlocks() {
        return $this->createQueryBuilder('about_block')
                ->orderBy('about_block.position', 'ASC')
                ->getQuery()
                ->getResult() ?? [];
    }
}
