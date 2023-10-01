<?php

namespace App\Entity;

use App\Repository\EtudePrestataireValidationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudePrestataireValidationRepository::class)]
class EtudePrestataireValidation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_prestataire = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $zone_intervention = null;

    #[ORM\Column(length: 255)]
    private ?string $agence_commerciale = null;

    #[ORM\Column(length: 255)]
    private ?string $code_client_crm = null;

    #[ORM\Column(length: 255)]
    private ?string $reference_fdp = null;

    #[ORM\Column(length: 255)]
    private ?string $reference_fat = null;

    #[ORM\Column]
    private ?int $distance_fat_client = null;

    #[ORM\Column]
    private ?int $nombre_poteaux_neccessaire = null;

    #[ORM\Column]
    private ?int $nombre_balancelle = null;

    #[ORM\Column]
    private ?int $nombre_crochet_arret = null;

    #[ORM\Column(length: 255)]
    private ?string $resultat_preetude = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations_preetude = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations_etudes = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrestataire(): ?string
    {
        return $this->nom_prestataire;
    }

    public function setNomPrestataire(string $nom_prestataire): static
    {
        $this->nom_prestataire = $nom_prestataire;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getZoneIntervention(): ?string
    {
        return $this->zone_intervention;
    }

    public function setZoneIntervention(string $zone_intervention): static
    {
        $this->zone_intervention = $zone_intervention;

        return $this;
    }

    public function getAgenceCommerciale(): ?string
    {
        return $this->agence_commerciale;
    }

    public function setAgenceCommerciale(string $agence_commerciale): static
    {
        $this->agence_commerciale = $agence_commerciale;

        return $this;
    }

    public function getCodeClientCrm(): ?string
    {
        return $this->code_client_crm;
    }

    public function setCodeClientCrm(string $code_client_crm): static
    {
        $this->code_client_crm = $code_client_crm;

        return $this;
    }

    public function getReferenceFdp(): ?string
    {
        return $this->reference_fdp;
    }

    public function setReferenceFdp(string $reference_fdp): static
    {
        $this->reference_fdp = $reference_fdp;

        return $this;
    }

    public function getReferenceFat(): ?string
    {
        return $this->reference_fat;
    }

    public function setReferenceFat(string $reference_fat): static
    {
        $this->reference_fat = $reference_fat;

        return $this;
    }

    public function getDistanceFatClient(): ?int
    {
        return $this->distance_fat_client;
    }

    public function setDistanceFatClient(int $distance_fat_client): static
    {
        $this->distance_fat_client = $distance_fat_client;

        return $this;
    }

    public function getNombrePoteauxNeccessaire(): ?int
    {
        return $this->nombre_poteaux_neccessaire;
    }

    public function setNombrePoteauxNeccessaire(int $nombre_poteaux_neccessaire): static
    {
        $this->nombre_poteaux_neccessaire = $nombre_poteaux_neccessaire;

        return $this;
    }

    public function getNombreBalancelle(): ?int
    {
        return $this->nombre_balancelle;
    }

    public function setNombreBalancelle(int $nombre_balancelle): static
    {
        $this->nombre_balancelle = $nombre_balancelle;

        return $this;
    }

    public function getNombreCrochetArret(): ?int
    {
        return $this->nombre_crochet_arret;
    }

    public function setNombreCrochetArret(int $nombre_crochet_arret): static
    {
        $this->nombre_crochet_arret = $nombre_crochet_arret;

        return $this;
    }

    public function getResultatPreetude(): ?string
    {
        return $this->resultat_preetude;
    }

    public function setResultatPreetude(string $resultat_preetude): static
    {
        $this->resultat_preetude = $resultat_preetude;

        return $this;
    }

    public function getObservationsPreetude(): ?string
    {
        return $this->observations_preetude;
    }

    public function setObservationsPreetude(?string $observations_preetude): static
    {
        $this->observations_preetude = $observations_preetude;

        return $this;
    }

    public function getObservationsEtudes(): ?string
    {
        return $this->observations_etudes;
    }

    public function setObservationsEtudes(?string $observations_etudes): static
    {
        $this->observations_etudes = $observations_etudes;

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
}
