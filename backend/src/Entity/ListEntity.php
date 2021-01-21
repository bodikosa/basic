<?php

namespace App\Entity;

use App\Infrasructure\Doctrine\Type\Timestamps;
use App\Repository\ListEntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListEntityRepository::class)
 * @ORM\Table(name="list")
 * @ORM\HasLifecycleCallbacks()
 */
class ListEntity implements \JsonSerializable
{
    use Timestamps;

    public const TYPE = [
        'INTEGER' => 1,
        'STRING' => 2,
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;


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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "type" => $this->getType(),
            "value" => $this->getValue(),
            "updatedAt" => $this->getCreatedAt()->format('Y-m-d H:i:s')
        ];
    }
}
