<?php

namespace App\Entity;

use App\Repository\CompagnyFilesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompagnyFilesRepository::class)]
class CompagnyFiles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'compagnyFiles')]
    private ?CategoryFilesUser $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?CategoryFilesUser
    {
        return $this->category;
    }

    public function setCategory(?CategoryFilesUser $category): self
    {
        $this->category = $category;

        return $this;
    }
}
