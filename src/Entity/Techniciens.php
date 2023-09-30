<?php

namespace App\Entity;

use App\Repository\TechniciensRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Post;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\TechniciensController;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: TechniciensRepository::class)]
#[Vich\Uploadable]
#[ApiResource(
    formats: ["json" => "application/json"],
    operations: [new GetCollection(), new Get(), new Delete(), new Put(), new Patch(), new Post(
        name: 'techniciens',
        uriTemplate: '/technicien/create',
        controller: TechniciensController::class,
        deserialize: false
    )],
    normalizationContext: ["groups" => ['technicien:read']],
    denormalizationContext: ["groups" => ['technicien:create']]
)]

class Techniciens implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['technicien:read'])]
    private ?int $id = null;

    #[Assert\NotBlank(message: "L'adresse email est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $email = null;

    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $nom = null;

    #[Assert\NotBlank(message: "Le prénom est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $prenom = null;

    #[Assert\NotBlank(message: "Le numero de votre cni est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $numero_cni = null;

    #[Assert\NotBlank(message: "Le numero de telephone est obligatoire")]
    #[ORM\Column]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?int $telephone = null;

    #[ORM\ManyToOne(inversedBy: 'techniciens')]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(['technicien:read'])]
    private ?Partenaires $partenaire = null;

    #[ORM\Column]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[Assert\NotBlank(message: "Le mot de passe est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:create'])]
    private ?string $password = null;

    #[ORM\Column]
    #[Groups(['technicien:create', 'technicien:read'])]
    private ?int $id_partenaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $ceraf_attache = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?int $matricule_camtel = null;

    #[Assert\NotBlank(message: "La localisation est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $localisation = null;

    #[Assert\NotBlank(message: "photo est obligatoire")]
    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['technicien:read', 'technicien:create'])]
    private ?string $photo = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "photo")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_photo = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPartenaire(): ?Partenaires
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaires $partenaire): static
    {
        $this->partenaire = $partenaire;

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


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getIdPartenaire(): ?int
    {
        return $this->id_partenaire;
    }

    public function setIdPartenaire(int $id_partenaire): static
    {
        $this->id_partenaire = $id_partenaire;

        return $this;
    }

    public function getCerafAttache(): ?string
    {
        return $this->ceraf_attache;
    }

    public function setCerafAttache(?string $ceraf_attache): static
    {
        $this->ceraf_attache = $ceraf_attache;

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


    public function getMatriculeCamtel(): ?int
    {
        return $this->matricule_camtel;
    }

    public function setMatriculeCamtel(?int $matricule_camtel): static
    {
        $this->matricule_camtel = $matricule_camtel;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     *
     * @return File|null
     */
    public function setFileProfile(?File $file): void
    {
        $this->file_photo = $file;
    }

    public function getFileProfile(): ?string
    {
        return $this->file_photo;
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
}
