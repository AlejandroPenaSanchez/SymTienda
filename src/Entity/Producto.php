<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $Unidades;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=2)
     */
    private $Precio;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getUnidades(): ?int
    {
        return $this->Unidades;
    }

    public function setUnidades(int $Unidades): self
    {
        $this->Unidades = $Unidades;

        return $this;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }

    public function setPrecio($Precio): self
    {
        $this->Precio = $Precio;

        return $this;
    }
}
