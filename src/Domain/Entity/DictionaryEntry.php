<?php

namespace App\Domain\Entity;

class DictionaryEntry extends AbstractEntity
{
    private int $valueId;
    private int $order;
    private string $value;
    private Dictionary $dictionary;

    /**
     * @return int
     */
    public function getValueId(): int
    {
        return $this->valueId;
    }

    /**
     * @param int $valueId
     * @return DictionaryEntry
     */
    public function setValueId(int $valueId): DictionaryEntry
    {
        $this->valueId = $valueId;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return DictionaryEntry
     */
    public function setValue(string $value): DictionaryEntry
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return DictionaryEntry
     */
    public function setOrder(int $order): DictionaryEntry
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return Dictionary
     */
    public function getDictionary(): Dictionary
    {
        return $this->dictionary;
    }

    /**
     * @param Dictionary $dictionary
     * @return DictionaryEntry
     */
    public function setDictionary(Dictionary $dictionary): DictionaryEntry
    {
        $this->dictionary = $dictionary;
        return $this;
    }

}