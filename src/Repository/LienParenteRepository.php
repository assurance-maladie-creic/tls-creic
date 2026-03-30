<?php

namespace App\Repository;

use App\Entity\LienParente;
use ...;

/**
 * @extends ServiceEntityRepository<LienParente>
 *
 * @method LienParente|null  find($id, $lockMode = null, $lockVersion = null)
 * @method LienParente|null  findOneBy(array $criteria, array $orderBy = null)
 * @method list<LienParente> findAll()
 * @method list<LienParente> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LienParenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LienParente::class);
    }
}
