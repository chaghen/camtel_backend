<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Partenaires;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class PartenaireStateProcessor implements ProcessorInterface
{

    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $passwordEncode)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof Partenaires) {
            if ($data->getPassword()) {
                $data->setPassword(
                    $this->passwordEncode->hashPassword($data, $data->getPassword())
                );

                $data->setCreatedAt(new \DateTimeImmutable());
                $data->setUpdatedAt(new \DateTimeImmutable());
                $data->setNumeroCni($data->getNumeroCni());
                $data->setRole("ROLE_PARTENAIRE");
            }
            $this->em->persist($data);
            $this->em->flush();
        }
    }
}
