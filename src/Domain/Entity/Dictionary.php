<?php

namespace App\Domain\Entity;

class Dictionary extends AbstractEntity
{
    protected string $name;

    /**
     * @var DictionaryEntry[]
     */
    protected array $entries;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Dictionary
     */
    public function setName(string $name): Dictionary
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param array $entries
     * @return Dictionary
     */
    public function addEntry(DictionaryEntry $entry): Dictionary
    {
        $this->entries[] = $entry;
        return $this;
    }

}