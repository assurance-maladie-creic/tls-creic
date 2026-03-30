<?php

namespace App\Repository;

use App\Entity\Demande;
use App\Enum\MotifContactEnum;
use App\Enum\StatutDemandeEnum;
use ...;

/**
 * @extends ServiceEntityRepository<Demande>
 *
 * @method Demande|null  find($id, $lockMode = null, $lockVersion = null)
 * @method Demande|null  findOneBy(array $criteria, array $orderBy = null)
 * @method list<Demande> findAll()
 * @method list<Demande> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demande::class);
    }

    // ...

}
