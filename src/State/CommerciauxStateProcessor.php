<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Commerciaux;
use App\Repository\CommerciauxRepository;
use App\Repository\PartenairesRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class CommerciauxStateProcessor implements ProcessorInterface
{

    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $passwordEncode, private PartenairesRepository $partenairesRepository, private CommerciauxRepository $commerciauxRepository)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof Commerciaux) {
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
