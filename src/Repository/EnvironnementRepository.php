<?php

namespace App\Repository;

use App\Entity\Environnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Environnement>
 */
class EnvironnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Environnement::class);
    }

    /**
     * Ajoute un environnement
     * @param Environnement $environnement
     * @return void
     */
    public function add(Environnement $environnement) : void {
        $this->getEntityManager()->persist($environnement);
        $this->getEntityManager()->flush();
    }
    
    /**
     * Supprime un environnement
     * @param Environnement $environnement
     * @return void
     */
    public function remove(Environnement $environnement) : void {
        $this->getEntityManager()->remove($environnement);
        $this->getEntityManager()->flush();
    }
}
