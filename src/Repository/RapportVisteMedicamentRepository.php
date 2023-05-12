<?php

namespace App\Repository;

use App\Entity\RapportVisteMedicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RapportVisteMedicament>
 *
 * @method RapportVisteMedicament|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportVisteMedicament|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportVisteMedicament[]    findAll()
 * @method RapportVisteMedicament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportVisteMedicamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportVisteMedicament::class);
    }

    public function save(RapportVisteMedicament $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RapportVisteMedicament $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RapportVisteMedicament[] Returns an array of RapportVisteMedicament objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RapportVisteMedicament
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
