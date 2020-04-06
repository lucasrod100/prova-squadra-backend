<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mapeamento da Classe Usuario
 *
 * @package App\Entities
 *
 * @ORM\Entity(repositoryClass="App\Repositories\UsuarioRepository")
 * @ORM\Table(name="usuario")
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private $nome;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Usuario
     */
    public function setId(int $id): Usuario
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome(string $nome): Usuario
    {
        $this->nome = $nome;
        return $this;
    }


}
