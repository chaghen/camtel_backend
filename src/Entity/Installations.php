<?php

namespace App\Entity;

use App\Repository\InstallationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstallationsRepository::class)]
class Installations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_tid = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_eid = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_index = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_eqn = null;

    #[ORM\Column]
    private ?int $distance_cable = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_serie_ont = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_serie_stb = null;

    #[ORM\Column]
    private ?int $nombre_poteau = null;

    #[ORM\Column(length: 255)]
    private ?string $resultat_test_connexion = null;

    #[ORM\Column(length: 255)]
    private ?string $prospecteur = null;

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

    public function getProspecteur(): ?string
    {
        return $this->prospecteur;
    }

    public function setProspecteur(string $prospecteur): static
    {
        $this->prospecteur = $prospecteur;

        return $this;
    }
}
