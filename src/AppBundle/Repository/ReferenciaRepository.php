<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Referencia;
use Doctrine\ORM\EntityRepository;

class ReferenciaRepository extends EntityRepository
{
    public function findByYear($year)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT r FROM AppBundle:Referencia r WHERE r.yearPub = :year ORDER BY r.created ASC'
            )
            ->setParameter('yearPub', $year)
            ->getResult();
    }
}