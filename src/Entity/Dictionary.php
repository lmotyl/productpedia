<?php

namespace App\Entity;

use App\Repository\DictionaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DictionaryRepository::class)]
#[ORM\Table(name: '`dictionary`')]
#[UniqueEntity('name')]
class Dictionary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("dictionary")]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[MaxDepth(1)]
    #[ORM\OneToMany(mappedBy: 'dictionary', targetEntity: DictionaryEntry::class)]
    private Collection $entry;

    #[ORM\Column(length: 255)]
    #[Groups("dictionary")]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 3,
        minMessage: "Dictionary name cannot be shorter than {{ limit }} characters long"
    )]
    private ?string $name = null;

    public function __construct()
    {
        $this->entry = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, DictionaryEntry>
     */
    public function getEntry(): Collection
    {
        return $this->entry;
    }

    public function addEntry(DictionaryEntry $entry): static
    {
        if (!$this->entry->contains($entry)) {
            $this->entry->add($entry);
            $entry->setDictionary($this);
        }

        return $this;
    }

    public function removeEntry(DictionaryEntry $entry): static
    {
        if ($this->entry->removeElement($entry)) {
            // set the owning side to null (unless already changed)
            if ($entry->getDictionary() === $this) {
                $entry->setDictionary(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name = null): static
    {
        $this->name = $name;

        return $this;
    }
}
