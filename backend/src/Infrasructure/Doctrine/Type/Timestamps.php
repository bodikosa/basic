<?php

namespace App\Infrasructure\Doctrine\Type;

use Doctrine\ORM\Mapping as ORM;

trait Timestamps {

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist()
     */
    public function createdAt(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt =  new \DateTime();
    }

    /**
     * @ORM\PrePersist()
     */
    public function updatedAt(): void
    {
        $this->updatedAt =  new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}