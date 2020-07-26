<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\State;
use App\Entity\StateTransition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StateTransition|null find($id, $lockMode = null, $lockVersion = null)
 * @method StateTransition|null findOneBy(array $criteria, array $orderBy = null)
 * @method StateTransition[]    findAll()
 * @method StateTransition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StateTransitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StateTransition::class);
    }
}
