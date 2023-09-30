<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Clients;
use App\Service\MailService;
use App\Service\UploadImageService;
use Doctrine\ORM\EntityManagerInterface;

class ClientStateProcessor implements ProcessorInterface
{

    public function __construct(private UploadImageService $uploadImagesService, private EntityManagerInterface $em, private MailService $mailService)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        if ($data instanceof Clients) {
            $client = new Clients();

            if ($data->getCniPhotoRecto() !== null && $data->getCniPhotoVerso() !== null) {
                $photo_recto = $this->uploadImagesService->upload($data->getCniPhotoRecto());
                $photo_verso = $this->uploadImagesService->upload($data->getCniPhotoVerso());
                $client->setCniPhotoRecto($photo_recto);
                $client->setCniPhotoVerso($photo_verso);


                //si l'utilisateur a envoyé les photos du registre du commerce
                if ($data->getRegistreCommercePhotoRecto() !== null && $data->getRegistreCommercePhotoVerso() !== null) {
                    $registre_recto = $this->uploadImagesService->upload($data->getCniPhotoRecto());
                    $registre_verso = $this->uploadImagesService->upload($data->getCniPhotoVerso());
                    $client->setRegistreCommercePhotoRecto($registre_recto);
                    $client->setRegistreCommercePhotoVerso($registre_verso);
                }
                $client->setCreatedAt(new \DateTimeImmutable());
                $client->setNom($data->getNom());
                $this->em->persist($client);
                $this->em->flush();
            }
        }
    }
}
