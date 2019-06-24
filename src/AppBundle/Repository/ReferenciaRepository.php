<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Referencia;
use Doctrine\ORM\EntityRepository;

class ReferenciaRepository extends EntityRepository
{
    public function findByType($type)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT r FROM AppBundle:Referencia r WHERE r.type = :type'
            )
            ->setParameter('type', $type)
            ->getResult();
    }
}