<?php
// api/src/Controller/CreateMediaObjectAction.php
namespace App\Controller;

use App\Entity\Techniciens;
use App\Repository\TechniciensRepository;
use App\Repository\PartenairesRepository;
use App\Service\MailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class TechniciensController extends AbstractController
{
    public function __construct(private MailService $mailService, private PartenairesRepository $partenairesRepository, private TechniciensRepository $technicienRepository, private UserPasswordHasherInterface $passwordEncode)
    {
    }
    public function __invoke(Request $request): Techniciens
    {
        $fileRecto = $request->files->get('file_photo');
        $technicien = new Techniciens();
        $technicien->setCreatedAt(new \DateTimeImmutable());
        $emai_exist = $this->technicienRepository->findOneByEmail($request->request->get('email'));
        $technicien->setEmail($request->request->get('email'));
        if ($emai_exist) {
            return $this->json(["message" => "Cette adresse email existe déjà", 422]);
        }
        $technicien->setLocalisation($request->request->get('localisation'));
        $technicien->setNumeroCni($request->request->get('numero_cni'));
        $technicien->setFileProfile($fileRecto);
        $technicien->setUpdatedAt(new \DateTimeImmutable());
        $technicien->setPhoto("photo");
        $technicien->setRole("ROLE_TECHNICIEN");
        $technicien->setNom($request->request->get('nom'));
        $technicien->setPrenom($request->request->get('prenom'));
        $technicien->setPassword(
            $this->passwordEncode->hashPassword($technicien, $request->request->get('password'))
        );

        $technicien->eraseCredentials();
        $technicien->setTelephone($request->request->get('telephone'));
        $partenaireId = $request->request->get('id_partenaire');
        $partenaire = $this->partenairesRepository->find($partenaireId);

        if ($partenaire !== null && $partenaire->getNom() == "camtel" && $partenaire->getId() == 1) {
            $technicien->setMatriculeCamtel($request->request->get('matricule_camtel'));
            $technicien->setCerafAttache($request->request->get('ceraf_attache'));
        }

        if ($partenaireId !== 0 && $partenaireId !== null) {
            $technicien->setIdPartenaire($partenaireId);
            $technicien->setPartenaire($partenaire);
        } else {
            $technicien->setIdPartenaire(0);
        }

        return $technicien;
    }
}
