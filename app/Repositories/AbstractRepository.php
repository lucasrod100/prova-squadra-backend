<?php


namespace App\Repositories;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\UnitOfWork;

abstract class AbstractRepository extends \Doctrine\ORM\EntityRepository
{
    public function getReference($id, $class = null)
    {
        if(!$class){
            $class = $this->getClassName();
        }

        return $this->getEntityManager()->getReference($class, $id);
    }

    public function salvar($entidade)
    {

        if ($this->_em->getUnitOfWork()->getEntityState($entidade) == UnitOfWork::STATE_NEW) {
            $this->_em->persist($entidade);
        }elseif ($this->_em->getUnitOfWork()->getEntityState($entidade) == UnitOfWork::STATE_DETACHED) {
            $entidade = $this->_em->merge($entidade);
        }

        $this->getEntityManager()->flush($entidade);

        return $entidade;
    }

    public function remover($id)
    {
        $entidade = $this->getReference($id);
        $this->getEntityManager()->remove($entidade);

        $this->getEntityManager()->flush($entidade);
    }

    public function paginacao($filtroDTO, $first, $limite)
    {
        $qb =  $this->createQueryBuilder('e');
        $qb = $this->setFiltroParam($qb, $filtroDTO);
        $qb->setFirstResult($first);
        $qb->setMaxResults($limite);
        $qb->orderBy('e.id', 'DESC');
        $query = $qb->getQuery();
        return $query->getArrayResult();
    }

    public function getQuantidadeResultado($filtroDTO)
    {
        $qb =  $this->createQueryBuilder('e');
        $qb->select('count(e.id)');
        $qb = $this->setFiltroParam($qb, $filtroDTO);
        return $qb->getQuery()->getSingleScalarResult();
    }

    public function setFiltroParam(QueryBuilder $qb, $filtroDTO)
    {
        return $qb;
    }
}
