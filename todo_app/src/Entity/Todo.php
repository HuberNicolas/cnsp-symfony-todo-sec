<?php

namespace App\Entity;

use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TodoRepository::class)
 */
class Todo
{
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $important;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $due_to;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="todos")
     */
    private $belongs_to;

    /**
     * @ORM\Column(type="boolean")
     */
    private $done;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isImportant(): ?bool
    {
        return $this->important;
    }

    public function setImportant(?bool $important): self
    {
        $this->important = $important;

        return $this;
    }

    public function getDueTo(): ?\DateTimeInterface
    {
        return $this->due_to;
    }

    public function setDueTo(?\DateTimeInterface $due_to): self
    {
        $this->due_to = $due_to;

        return $this;
    }

    public function getBelongsTo(): ?User
    {
        return $this->belongs_to;
    }

    public function setBelongsTo(?User $belongs_to): self
    {
        $this->belongs_to = $belongs_to;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->done;
    }

    public function setDone(bool $done): self
    {
        $this->done = $done;

        return $this;
    }
}
