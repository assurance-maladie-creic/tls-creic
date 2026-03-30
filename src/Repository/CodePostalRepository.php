<?php

namespace App\Repository;

use App\Entity\CodePostal;
use ...;

/**
 * @extends ServiceEntityRepository<CodePostal>
 *
 * @method CodePostal|null  find($id, $lockMode = null, $lockVersion = null)
 * @method CodePostal|null  findOneBy(array $criteria, array $orderBy = null)
 * @method list<CodePostal> findAll()
 * @method list<CodePostal> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodePostalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodePostal::class);
    }
}
