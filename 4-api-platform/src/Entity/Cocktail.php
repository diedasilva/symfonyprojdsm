<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CocktailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CocktailRepository::class)]
#[ApiResource()]

class Cocktail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $strDrink = null;

    #[ORM\Column(length: 1500, nullable: true)]
    private ?string $strInstructions = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $strIngredient1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $strIngredient2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $strIngredient3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStrDrink(): ?string
    {
        return $this->strDrink;
    }

    public function setStrDrink(string $strDrink): self
    {
        $this->strDrink = $strDrink;

        return $this;
    }

    public function getStrInstructions(): ?string
    {
        return $this->strInstructions;
    }

    public function setStrInstructions(?string $strInstructions): self
    {
        $this->strInstructions = $strInstructions;

        return $this;
    }

    public function getStrIngredient1(): ?string
    {
        return $this->strIngredient1;
    }

    public function setStrIngredient1(?string $strIngredient1): self
    {
        $this->strIngredient1 = $strIngredient1;

        return $this;
    }

    public function getStrIngredient2(): ?string
    {
        return $this->strIngredient2;
    }

    public function setStrIngredient2(?string $strIngredient2): self
    {
        $this->strIngredient2 = $strIngredient2;

        return $this;
    }

    public function getStrIngredient3(): ?string
    {
        return $this->strIngredient3;
    }

    public function setStrIngredient3(?string $strIngredient3): self
    {
        $this->strIngredient3 = $strIngredient3;

        return $this;
    }
}
