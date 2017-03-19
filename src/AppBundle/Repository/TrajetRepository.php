<?php
/**
 * Created by PhpStorm.
 * User: Orkolnium
 * Date: 23/02/2017
 * Time: 17:54
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Trajet;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
class TrajetRepository extends EntityRepository
{

    public function loadValidTrajet($source,$destination,$time){
        /*
         * Pour tout les trajet avec datefin < now
         * ceux qui ont pour ville de depart egale a source ou (une villee tape egale a source avec date <da
         * tefin
         *
         *
         */
        return $this->createQueryBuilder('t')
            ->where('t.IDvilledep = :source AND t.IDvillefin >= :dest AND t.date >= :now')
            ->setParameter('source', $source)
            ->setParameter('dest', $destination)
            ->setParameter('now',$time)
            ->getQuery()
            ->getResult();

    }

    // public function getTrajetFromId($id){
    //
    //   return $this->getEntityManager(t)
    //               ->select('t')
    //               ->from('AppBundle:Trajet','t')
    //               ->where('t.id= :id')
    //               ->setParameter('id',$id)
    //               ->getQuery();
    // }
}
