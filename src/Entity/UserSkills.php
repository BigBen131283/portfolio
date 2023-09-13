<?php

namespace App\Entity;

use App\Repository\UserSkillsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSkillsRepository::class)]
class UserSkills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mastery = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Skills $language = null;

    #[ORM\ManyToOne(inversedBy: 'UserSkills')]
    private ?Users $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMastery(): ?string
    {
        return $this->mastery;
    }

    public function setMastery(?string $mastery): static
    {
        $this->mastery = $mastery;

        return $this;
    }

    public function getLanguage(): ?Skills
    {
        return $this->language;
    }

    public function setLanguage(?Skills $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
