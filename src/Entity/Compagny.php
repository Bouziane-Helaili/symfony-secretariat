<?php

namespace App\Entity;

use App\Repository\CompagnyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompagnyRepository::class)]
class Compagny
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $compagnyName = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $leaderName = null;

    #[ORM\Column(length: 255)]
    private ?string $leaderFirstName = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $additionalAddress = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $siretNumber = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\OneToMany(mappedBy: 'compagny', targetEntity: CompagnyFiles::class)]
    private Collection $compagnyFiles;

    public function __construct()
    {
        $this->compagnyFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagnyName(): ?string
    {
        return $this->compagnyName;
    }

    public function setCompagnyName(string $compagnyName): self
    {
        $this->compagnyName = $compagnyName;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getLeaderName(): ?string
    {
        return $this->leaderName;
    }

    public function setLeaderName(string $leaderName): self
    {
        $this->leaderName = $leaderName;

        return $this;
    }

    public function getLeaderFirstName(): ?string
    {
        return $this->leaderFirstName;
    }

    public function setLeaderFirstName(string $leaderFirstName): self
    {
        $this->leaderFirstName = $leaderFirstName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additionalAddress;
    }

    public function setAdditionalAddress(?string $additionalAddress): self
    {
        $this->additionalAddress = $additionalAddress;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSiretNumber(): ?string
    {
        return $this->siretNumber;
    }

    public function setSiretNumber(string $siretNumber): self
    {
        $this->siretNumber = $siretNumber;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

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
            $compagnyFile->setCompagny($this);
        }

        return $this;
    }

    public function removeCompagnyFile(CompagnyFiles $compagnyFile): self
    {
        if ($this->compagnyFiles->removeElement($compagnyFile)) {
            // set the owning side to null (unless already changed)
            if ($compagnyFile->getCompagny() === $this) {
                $compagnyFile->setCompagny(null);
            }
        }

        return $this;
    }
}
