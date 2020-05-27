<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    // /**
    //  * @ORM\Column(type="text", nullable=true)
    //  */
    // private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeSpent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeEstimated;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    // public function getComment(): ?string
    // {
    //     return $this->comment;
    // }

    // public function setComment(?string $comment): self
    // {
    //     $this->comment = $comment;

    //     return $this;
    // }

    public function getTimeSpent(): ?string
    {
        return $this->timeSpent;
    }

    public function setTimeSpent(?string $timeSpent): self
    {
        $this->timeSpent = $timeSpent;

        return $this;
    }

    public function getTimeEstimated(): ?string
    {
        return $this->timeEstimated;
    }

    public function setTimeEstimated(?string $timeEstimated): self
    {
        $this->timeEstimated = $timeEstimated;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
