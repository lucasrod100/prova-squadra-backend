<?php


namespace App\Repositories;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;

class SistemaRepository extends AbstractRepository
{
    public function setFiltroParam(QueryBuilder $qb, $filtroDTO)
    {
        $x = false;
        if (!empty($filtroDTO->getDescricao())) {
            $qb->where("e.descricao LIKE :descricao");
            $qb->setParameter('descricao', '%' . $filtroDTO->getDescricao() . '%');
            $x = true;
        }
        if (!empty($filtroDTO->getSigla())) {
            $x ? $qb->orWhere("e.sigla LIKE :sigla") : $qb->where("e.sigla LIKE :sigla");
            $qb->setParameter('sigla', '%' . $filtroDTO->getSigla() . '%');
        }
        if (!empty($filtroDTO->getEmail())) {
            $x ? $qb->orWhere("e.email LIKE :email") : $qb->where("e.email LIKE :email");
            $qb->setParameter('email', '%' . $filtroDTO->getEmail() . '%');
        }

        return $qb;
    }

    public function consultaPorId($id)
    {
        $qb =  $this->createQueryBuilder('e');
            $qb->select('e','u')
            ->leftJoin('App\Entities\Usuario', 'u', Join::WITH, 'e.usuarioAlteracao = u.id')
            ->where('e.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getArrayResult();
    }
}
