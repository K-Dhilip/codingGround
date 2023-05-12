<?php

namespace App\Repository;

use App\Entity\MysqlH1722031163UDevP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MysqlH1722031163UDevP>
 *
 * @method MysqlH1722031163UDevP|null find($id, $lockMode = null, $lockVersion = null)
 * @method MysqlH1722031163UDevP|null findOneBy(array $criteria, array $orderBy = null)
 * @method MysqlH1722031163UDevP[]    findAll()
 * @method MysqlH1722031163UDevP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MysqlH1722031163UDevPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MysqlH1722031163UDevP::class);
    }

    public function save(MysqlH1722031163UDevP $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MysqlH1722031163UDevP $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MysqlH1722031163UDevP[] Returns an array of MysqlH1722031163UDevP objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MysqlH1722031163UDevP
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
