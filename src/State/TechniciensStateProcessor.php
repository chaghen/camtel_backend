<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Techniciens;
use App\Repository\PartenairesRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class TechniciensStateProcessor implements ProcessorInterface
{

    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $passwordEncode, private PartenairesRepository $partenairesRepository)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof Techniciens) {
            if ($data->getPassword()) {
                $data->setPassword(
                    $this->passwordEncode->hashPassword($data, $data->getPassword())
                );

                $data->setCreatedAt(new \DateTimeImmutable());
                $partenaire = $this->partenairesRepository->find($data->getIdPartenaire());
                $data->setIdPartenaire($data->getIdPartenaire());
                $data->setPartenaire($partenaire);
            }
            $this->em->persist($data);
            $this->em->flush();
        }
    }
}
