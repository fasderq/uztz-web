<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class MachineRepository extends EntityRepository
{
    public function getHot()
    {
        return $this->createQueryBuilder('machine')
            ->where('machine.hot = true')
            ->getQuery()
            ->getResult() ?? [];
    }
}
