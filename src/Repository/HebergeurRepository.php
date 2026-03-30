<?php

namespace App\Repository;

use App\Entity\Hebergeur;
use ...;

/**
 * @extends ServiceEntityRepository<Hebergeur>
 *
 * @method Hebergeur|null  find($id, $lockMode = null, $lockVersion = null)
 * @method Hebergeur|null  findOneBy(array $criteria, array $orderBy = null)
 * @method list<Hebergeur> findAll()
 * @method list<Hebergeur> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HebergeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hebergeur::class);
    }
}
