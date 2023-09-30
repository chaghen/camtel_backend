<?php

namespace App\Entity;


use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use Symfony\Component\HttpFoundation\File\File;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Post;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use App\Controller\ClientsController;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[Vich\Uploadable]
#[ApiResource(operations: [
    new GetCollection(),
    new Get(), new Delete(), new Put(), new Patch(),
    new Post(
        name: 'publication',
        uriTemplate: '/client/create',
        controller: ClientsController::class,
        deserialize: false
    )
], normalizationContext: ["groups" => ['read']])]

class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commercial:read', 'read'])]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Le type de client est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $type_client = null;

    #[Assert\NotBlank(message: "Sélectionnez votre région")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $region = null;

    #[Assert\NotBlank(message: "Sélectionnez votre ville")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $ville = null;

    #[Assert\NotBlank(message: "donnez votre localisation")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $localisation = null;

    #[Assert\NotBlank(message: "L'adresse email' est obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $email = null;

    #[Assert\NotBlank(message: "Votre nom obligatoire")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $nom = null;

    #[Assert\NotBlank(message: "Veuillez remplir votre numero de téléphone")]
    #[ORM\Column]
    #[Groups(['commercial:read', 'read'])]
    private ?int $telephone_un = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['commercial:read', 'read'])]
    private ?int $telephone_deux = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['commercial:read', 'read'])]
    private ?int $telephone_trois = null;

    #[Assert\NotBlank(message: "Remplissez le numero de votre cni s'il vous plait")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $cni = null;

    #[Assert\NotBlank(message: "la photo recto de votre cni")]
    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $cni_photo_recto = null;

    #[Assert\NotBlank(message: "La photo verso de votre cni")]
    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $cni_photo_verso = null;

    #[Assert\NotBlank(message: "Photo obligatoire")]
    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $photo_profile = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "cni_photo_recto")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_recto = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "cni_photo_verso")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_verso = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('read')]
    private ?string $registre_commerce = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $registre_commerce_photo_recto = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $registre_commerce_photo_verso = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "registre_commerce_photo_verso")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_registre_verso = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "registre_commerce_photo_recto")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_registre_recto = null;

    #[Vich\UploadableField(mapping: "media_object", fileNameProperty: "photo_profile")]
    #[Assert\NotNull(groups: ['media_object_create'])]
    public ?File $file_profil = null;

    #[Assert\NotBlank(message: "Choisissez une offre s'il vous plait")]
    #[ORM\Column(length: 255)]
    #[Groups(['commercial:read', 'read'])]
    private ?string $offre_choisie = null;

    #[Assert\NotBlank(message: "l'identifiant de souscription est obligatoire")]
    #[ORM\Column]
    #[Groups(['commercial:read', 'read'])]
    private ?int $souscription_id = null;

    #[ORM\Column]
    #[Groups(['commercial:read', 'read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('read')]
    private ?string $signature = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('read')]
    private ?string $nom_partenaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email_partenaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $localisation_gps = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('commercial:read')]
    private ?string $plan_localisation = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    private ?Commerciaux $commercial = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    private ?Partenaires $partenaire = null;

    #[ORM\Column]
    private ?int $id_commercial = null;

    #[ORM\Column]
    private ?int $id_partenaire = null;

    public function __construct()
    {
        $this->souscription_id = 0;
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeClient(): ?string
    {
        return $this->type_client;
    }

    public function setTypeClient(string $type_client): static
    {
        $this->type_client = $type_client;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephoneUn(): ?int
    {
        return $this->telephone_un;
    }

    public function setTelephoneUn(int $telephone_un): static
    {
        $this->telephone_un = $telephone_un;

        return $this;
    }

    public function getTelephoneDeux(): ?int
    {
        return $this->telephone_deux;
    }

    public function setTelephoneDeux(?int $telephone_deux): static
    {
        $this->telephone_deux = $telephone_deux;

        return $this;
    }

    public function getTelephoneTrois(): ?int
    {
        return $this->telephone_trois;
    }

    public function setTelephoneTrois(?int $telephone_trois): static
    {
        $this->telephone_trois = $telephone_trois;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): static
    {
        $this->cni = $cni;

        return $this;
    }

    public function getCniPhotoRecto(): ?string
    {
        return $this->cni_photo_recto;
    }

    public function setCniPhotoRecto(string $cni_photo_recto): static
    {
        $this->cni_photo_recto = $cni_photo_recto;

        return $this;
    }

    public function getCniPhotoVerso(): ?string
    {
        return $this->cni_photo_verso;
    }

    public function setCniPhotoVerso(string $cni_photo_verso): static
    {
        $this->cni_photo_verso = $cni_photo_verso;

        return $this;
    }

    public function getRegistreCommerce(): ?string
    {
        return $this->registre_commerce;
    }

    public function setRegistreCommerce(?string $registre_commerce): static
    {
        $this->registre_commerce = $registre_commerce;

        return $this;
    }

    public function getRegistreCommercePhotoRecto(): ?string
    {
        return $this->registre_commerce_photo_recto;
    }

    public function setRegistreCommercePhotoRecto(?string $registre_commerce_photo_recto): static
    {
        $this->registre_commerce_photo_recto = $registre_commerce_photo_recto;

        return $this;
    }

    public function getRegistreCommercePhotoVerso(): ?string
    {
        return $this->registre_commerce_photo_verso;
    }

    public function setRegistreCommercePhotoVerso(?string $registre_commerce_photo_verso): static
    {
        $this->registre_commerce_photo_verso = $registre_commerce_photo_verso;

        return $this;
    }

    public function getOffreChoisie(): ?string
    {
        return $this->offre_choisie;
    }

    public function setOffreChoisie(string $offre_choisie): static
    {
        $this->offre_choisie = $offre_choisie;

        return $this;
    }

    public function getSouscriptionId(): ?int
    {
        return $this->souscription_id;
    }

    public function setSouscriptionId(int $souscription_id): static
    {
        $this->souscription_id = $souscription_id;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->updatedAt = $createdAt;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): static
    {
        $this->signature = $signature;

        return $this;
    }

    public function getNomPartenaire(): ?string
    {
        return $this->nom_partenaire;
    }

    public function setNomPartenaire(?string $nom_partenaire): static
    {
        $this->nom_partenaire = $nom_partenaire;

        return $this;
    }

    public function getEmailPartenaire(): ?string
    {
        return $this->email_partenaire;
    }

    public function setEmailPartenaire(?string $email_partenaire): static
    {
        $this->email_partenaire = $email_partenaire;

        return $this;
    }

    /**
     *
     * @return File|null
     */
    public function getFileRecto(): ?File
    {
        return $this->file_recto;
    }

    /**
     *
     * @return File|null
     */
    public function setFileRecto(?File $file): void
    {
        $this->file_recto = $file;
    }


    /**
     *
     * @return File|null
     */
    public function setFileVerso(?File $file): void
    {
        $this->file_verso = $file;
    }


    /**
     *
     * @return File|null
     */
    public function getFileVerso(): ?File
    {
        return $this->file_verso;
    }


    /**
     *
     * @return File|null
     */
    public function getFileRegistreRecto(): ?File
    {
        return $this->file_registre_recto;
    }

    /**
     *
     * @return File|null
     */
    public function setFileRegistreRecto(?File $file): void
    {
        $this->file_registre_recto = $file;
    }


    /**
     *
     * @return File|null
     */
    public function getFileRegistreVerso(): ?File
    {
        return $this->file_registre_verso;
    }

    /**
     *
     * @return File|null
     */
    public function setFileRegistreVerso(?File $file): void
    {
        $this->file_registre_verso = $file;
    }


    /**
     *
     * @return File|null
     */
    public function getFileProfile(): ?File
    {
        return $this->file_profil;
    }

    /**
     *
     * @return File|null
     */
    public function setFileProfile(?File $file): void
    {
        $this->file_profil = $file;
    }



    public function getPhotoProfile(): ?string
    {
        return $this->photo_profile;
    }

    public function setPhotoProfile(string $photo_profile): static
    {
        $this->photo_profile = $photo_profile;

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

    public function getLocalisationGps(): ?string
    {
        return $this->localisation_gps;
    }

    public function setLocalisationGps(?string $localisation_gps): static
    {
        $this->localisation_gps = $localisation_gps;

        return $this;
    }

    public function getPlanLocalisation(): ?string
    {
        return $this->plan_localisation;
    }

    public function setPlanLocalisation(?string $plan_localisation): static
    {
        $this->plan_localisation = $plan_localisation;

        return $this;
    }

    public function getCommercial(): ?Commerciaux
    {
        return $this->commercial;
    }

    public function setCommercial(?Commerciaux $commercial): static
    {
        $this->commercial = $commercial;

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

    public function getIdCommercial(): ?int
    {
        return $this->id_commercial;
    }

    public function setIdCommercial(int $id_commercial): static
    {
        $this->id_commercial = $id_commercial;

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
}
