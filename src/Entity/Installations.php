<?php

namespace App\Entity;

use App\Repository\InstallationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Get;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: InstallationsRepository::class)]
#[ApiResource(operations: [
    new GetCollection(),
    new Get(), new Delete(), new Put(), new Patch(),
    new Post()
])]
class Installations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le téléphone est obligatoire")]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numéro de tid est obligatoire")]
    private ?string $numero_tid = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numero Eid est obligatoire")]
    private ?string $numero_eid = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numero d'index est obligatoire")]
    private ?string $numero_index = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numero Eqn est obligatoire")]
    private ?string $numero_eqn = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La distance cable est obligatoire")]
    private ?int $distance_cable = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numero de serie ONT est obligatoire")]
    private ?string $numero_serie_ont = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numero de serie stb est obligatoire")]
    private ?string $numero_serie_stb = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le nombre de poteaux est obligatoire")]
    private ?int $nombre_poteau = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le resultat de test connexion est obligatoire")]
    private ?string $resultat_test_connexion = null;

    #[ORM\ManyToOne(inversedBy: 'installations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partenaires $prospecteur = null;

    #[ORM\ManyToOne(inversedBy: 'installations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Techniciens $technicien = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le conseiller client est obligatoire")]
    private ?string $conseiller_client = null;

    #[ORM\ManyToOne(inversedBy: 'installations')]
    private ?Techniciens $technicien_camtel = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date_evaluation = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumeroTid(): ?string
    {
        return $this->numero_tid;
    }

    public function setNumeroTid(string $numero_tid): static
    {
        $this->numero_tid = $numero_tid;

        return $this;
    }

    public function getNumeroEid(): ?string
    {
        return $this->numero_eid;
    }

    public function setNumeroEid(string $numero_eid): static
    {
        $this->numero_eid = $numero_eid;

        return $this;
    }

    public function getNumeroIndex(): ?string
    {
        return $this->numero_index;
    }

    public function setNumeroIndex(string $numero_index): static
    {
        $this->numero_index = $numero_index;

        return $this;
    }

    public function getNumeroEqn(): ?string
    {
        return $this->numero_eqn;
    }

    public function setNumeroEqn(string $numero_eqn): static
    {
        $this->numero_eqn = $numero_eqn;

        return $this;
    }

    public function getDistanceCable(): ?int
    {
        return $this->distance_cable;
    }

    public function setDistanceCable(int $distance_cable): static
    {
        $this->distance_cable = $distance_cable;

        return $this;
    }

    public function getNumeroSerieOnt(): ?string
    {
        return $this->numero_serie_ont;
    }

    public function setNumeroSerieOnt(string $numero_serie_ont): static
    {
        $this->numero_serie_ont = $numero_serie_ont;

        return $this;
    }

    public function getNumeroSerieStb(): ?string
    {
        return $this->numero_serie_stb;
    }

    public function setNumeroSerieStb(string $numero_serie_stb): static
    {
        $this->numero_serie_stb = $numero_serie_stb;

        return $this;
    }

    public function getNombrePoteau(): ?int
    {
        return $this->nombre_poteau;
    }

    public function setNombrePoteau(int $nombre_poteau): static
    {
        $this->nombre_poteau = $nombre_poteau;

        return $this;
    }

    public function getResultatTestConnexion(): ?string
    {
        return $this->resultat_test_connexion;
    }

    public function setResultatTestConnexion(string $resultat_test_connexion): static
    {
        $this->resultat_test_connexion = $resultat_test_connexion;

        return $this;
    }

    public function getProspecteur(): ?Partenaires
    {
        return $this->prospecteur;
    }

    public function setProspecteur(?Partenaires $prospecteur): static
    {
        $this->prospecteur = $prospecteur;

        return $this;
    }

    public function getTechnicien(): ?Techniciens
    {
        return $this->technicien;
    }

    public function setTechnicien(?Techniciens $technicien): static
    {
        $this->technicien = $technicien;

        return $this;
    }

    public function getConseillerClient(): ?string
    {
        return $this->conseiller_client;
    }

    public function setConseillerClient(string $conseiller_client): static
    {
        $this->conseiller_client = $conseiller_client;

        return $this;
    }

    public function getTechnicienCamtel(): ?Techniciens
    {
        return $this->technicien_camtel;
    }

    public function setTechnicienCamtel(?Techniciens $technicien_camtel): static
    {
        $this->technicien_camtel = $technicien_camtel;

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

    public function getDateEvaluation(): ?\DateTimeImmutable
    {
        return $this->date_evaluation;
    }

    public function setDateEvaluation(?\DateTimeImmutable $date_evaluation): static
    {
        $this->date_evaluation = $date_evaluation;

        return $this;
    }
}
