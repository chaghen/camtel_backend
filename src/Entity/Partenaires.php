<?php

namespace App\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\PartenairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\State\PartenaireStateProcessor;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Get;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PartenairesRepository::class)]
#[Vich\Uploadable]
#[ApiResource(formats: ["json" => "application/json"], operations: [new GetCollection(), new Get(), new Delete(), new Put(), new Patch()], normalizationContext: ["groups" => ['partenaire:read']], denormalizationContext: ['partenaire:create'])]
#[Post(processor: PartenaireStateProcessor::class)]
class Partenaires implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['partenaire:read', 'commercial:read', 'technicien:read'])]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['partenaire:read', 'partenaire:create', 'commercial:read', 'technicien:read'])]
    private ?string $nom = null;

    #[Assert\NotBlank(message: "email est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['partenaire:read', 'partenaire:create', 'commercial:read', 'technicien:read'])]
    private ?string $email = null;

    #[Assert\NotBlank(message: "Le mot de passe est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['partenaire:create'])]
    private ?string $password = null;

    #[ORM\Column]
    #[Groups(['partenaire:read', 'partenaire:read', 'commercial:read', 'technicien:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'partenaire', targetEntity: Techniciens::class, orphanRemoval: true)]
    private Collection $techniciens;

    #[ORM\OneToMany(mappedBy: 'partenaire', targetEntity: Commerciaux::class, orphanRemoval: true)]
    #[Groups(['partenaire:read'])]
    private Collection $commerciauxes;

    #[ORM\OneToMany(mappedBy: 'partenaire', targetEntity: Clients::class)]
    private Collection $clients;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Groups(['partenaire:read', 'partenaire:read'])]
    #[ORM\Column(length: 255)]
    private ?string $numero_cni = null;

    #[Groups(['partenaire:read', 'partenaire:read'])]
    #[ORM\Column(length: 255)]
    private ?string $role = null;

    public function __construct()
    {
        $this->techniciens = new ArrayCollection();
        $this->commerciauxes = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }



    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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
     * @return Collection<int, Techniciens>
     */
    public function getTechniciens(): Collection
    {
        return $this->techniciens;
    }

    public function addTechnicien(Techniciens $technicien): static
    {
        if (!$this->techniciens->contains($technicien)) {
            $this->techniciens->add($technicien);
            $technicien->setPartenaire($this);
        }

        return $this;
    }

    public function removeTechnicien(Techniciens $technicien): static
    {
        if ($this->techniciens->removeElement($technicien)) {
            // set the owning side to null (unless already changed)
            if ($technicien->getPartenaire() === $this) {
                $technicien->setPartenaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commerciaux>
     */
    public function getCommerciauxes(): Collection
    {
        return $this->commerciauxes;
    }

    public function addCommerciaux(Commerciaux $commerciaux): static
    {
        if (!$this->commerciauxes->contains($commerciaux)) {
            $this->commerciauxes->add($commerciaux);
            $commerciaux->setPartenaire($this);
        }

        return $this;
    }

    public function removeCommerciaux(Commerciaux $commerciaux): static
    {
        if ($this->commerciauxes->removeElement($commerciaux)) {
            // set the owning side to null (unless already changed)
            if ($commerciaux->getPartenaire() === $this) {
                $commerciaux->setPartenaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setPartenaire($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): static
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getPartenaire() === $this) {
                $client->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->updatedAt = $createdAt;

        return $this;
    }

    public function getNumeroCni(): ?string
    {
        return $this->numero_cni;
    }

    public function setNumeroCni(string $numero_cni): static
    {
        $this->numero_cni = $numero_cni;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
}
