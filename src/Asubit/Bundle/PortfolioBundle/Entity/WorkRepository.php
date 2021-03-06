<?php

namespace Asubit\Bundle\PortfolioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * WorkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WorkRepository extends EntityRepository
{
    public function findByCategory($category){
        $query = $this->getEntityManager()
                    ->createQuery("
                        SELECT w FROM AsubitPortfolioBundle:Work w
                        WHERE w.category = :category"
                    )->setParameter('category', $category);
        return $query->getResult();
    }

    public function findByTool($tool){
        $query = $this->getEntityManager()
                    ->createQuery("
                        SELECT w FROM AsubitPortfolioBundle:Work w
                        WHERE w.tool = :tool"
                    )->setParameter('tool', $tool)->setMaxResults(4);
        return $query->getResult();
    }
}
