<?php

namespace App\Entity;

use App\Repository\DictionaryEntryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

#[ORM\Entity(repositoryClass: DictionaryEntryRepository::class)]
#[ORM\Table(name: '`dictionary_entry`')]
class DictionaryEntry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("dictionary_entry")]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups("dictionary_entry")]
    private ?int $valueId = null;

    #[ORM\Column(length: 255)]
    #[Groups("dictionary_entry")]
    private ?string $value = null;

    #[ORM\Column]
    #[Groups("dictionary_entry")]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups("dictionary_entry")]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'entry')]
    #[ORM\JoinColumn(nullable: false)]
    #[MaxDepth(1)]
    private ?Dictionary $dictionary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getValueId(): ?int
    {
        return $this->valueId;
    }

    public function setValueId(int $valueId): static
    {
        $this->valueId = $valueId;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDictionary(): ?Dictionary
    {
        return $this->dictionary;
    }

    public function setDictionary(?Dictionary $dictionary): static
    {
        $this->dictionary = $dictionary;

        return $this;
    }
}
