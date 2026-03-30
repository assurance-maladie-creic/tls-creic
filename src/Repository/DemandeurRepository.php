<?php

namespace App\Repository;

use App\DTO\RechercheDossierCreationDemandeDTO;
use App\Entity\Demandeur;
use ...;

/**
 * @extends ServiceEntityRepository<Demandeur>
 *
 * @method Demandeur|null  find($id, $lockMode = null, $lockVersion = null)
 * @method Demandeur|null  findOneBy(array $criteria, array $orderBy = null)
 * @method list<Demandeur> findAll()
 * @method list<Demandeur> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandeur::class);
    }

    // ...

}
