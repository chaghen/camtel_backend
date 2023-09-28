<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserStateProcessor implements ProcessorInterface
{

    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $passwordEncode)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof User) {
            if ($data->getPassword()) {
                $data->setPassword(
                    $this->passwordEncode->hashPassword($data, $data->getPassword())
                );
                $data->eraseCredentials();
                $data->setCreatedAt(new \DateTimeImmutable());
            }
            $this->em->persist($data);
            $this->em->flush();
        }
    }
}
