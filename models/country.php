<?php 

class Country
{       
    private int $id;
    private string $name;
    private string $key;

    
    public function __construct(string $name = null, string $key = null) {
        $this->name = $name;
        $this->key = $key;
    }
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of key
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Set the value of key
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }
}
