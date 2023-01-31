<?php

namespace App\Entity;

use App\Repository\CategoryFilesUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryFilesUserRepository::class)]
class CategoryFilesUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: UserFile::class)]
    private Collection $userFiles;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: CompagnyFiles::class)]
    private Collection $compagnyFiles;

    public function __construct()
    {
        $this->userFiles = new ArrayCollection();
        $this->compagnyFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, UserFile>
     */
    public function getUserFiles(): Collection
    {
        return $this->userFiles;
    }

    public function addUserFile(UserFile $userFile): self
    {
        if (!$this->userFiles->contains($userFile)) {
            $this->userFiles->add($userFile);
            $userFile->setCategory($this);
        }

        return $this;
    }

    public function removeUserFile(UserFile $userFile): self
    {
        if ($this->userFiles->removeElement($userFile)) {
            // set the owning side to null (unless already changed)
            if ($userFile->getCategory() === $this) {
                $userFile->setCategory(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, CompagnyFiles>
     */
    public function getCompagnyFiles(): Collection
    {
        return $this->compagnyFiles;
    }

    public function addCompagnyFile(CompagnyFiles $compagnyFile): self
    {
        if (!$this->compagnyFiles->contains($compagnyFile)) {
            $this->compagnyFiles->add($compagnyFile);
            $compagnyFile->setCategory($this);
        }

        return $this;
    }

    public function removeCompagnyFile(CompagnyFiles $compagnyFile): self
    {
        if ($this->compagnyFiles->removeElement($compagnyFile)) {
            // set the owning side to null (unless already changed)
            if ($compagnyFile->getCategory() === $this) {
                $compagnyFile->setCategory(null);
            }
        }

        return $this;
    }
}
