<?php
// api/src/Controller/CreateMediaObjectAction.php
namespace App\Controller;

use App\Entity\Commerciaux;
use App\Repository\CommerciauxRepository;
use App\Repository\PartenairesRepository;
use App\Service\MailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class CommerciauxController extends AbstractController
{
    public function __construct(private MailService $mailService, private PartenairesRepository $partenairesRepository, private CommerciauxRepository $commerciauxRepository, private UserPasswordHasherInterface $passwordEncode)
    {
    }
    public function __invoke(Request $request): Commerciaux
    {
        $fileRecto = $request->files->get('file_photo');
        $commercial = new Commerciaux();
        $commercial->setCreatedAt(new \DateTimeImmutable());
        $commercial->setEmail($request->request->get('email'));
        $emai_exist = $this->commerciauxRepository->findOneByEmail($request->request->get('email'));
        if ($emai_exist) {
            return $this->json(["message" => "Cette adresse email existe déjà", 422]);
        }
        $commercial->setLocalisation($request->request->get('localisation'));
        $commercial->setNumeroCni($request->request->get('numero_cni'));
        $commercial->setPhoto("df");
        $commercial->setFileProfile($fileRecto);
        $commercial->setRole("ROLE_COMMERCIAL");
        $commercial->setUpdatedAt(new \DateTimeImmutable());
        $commercial->setNom($request->request->get('nom'));
        $commercial->setPrenom($request->request->get('prenom'));
        $commercial->setPassword(
            $this->passwordEncode->hashPassword($commercial, $request->request->get('password'))
        );
        $commercial->eraseCredentials();
        $commercial->setTelephone($request->request->get('telephone'));
        $partenaireId = $request->request->get('id_partenaire');
        $partenaire = $this->partenairesRepository->find($partenaireId);

        if ($partenaire !== null && $partenaire->getNom() == "camtel" && $partenaire->getId() == 1) {
            $commercial->setMatriculeCamtel($request->request->get('matricule_camtel'));
            $commercial->setAgenceAttache($request->request->get('agence_attache'));
        }
        if ($partenaireId !== 0 && $partenaireId !== null) {
            $commercial->setIdPartenaire($partenaireId);
            $commercial->setPartenaire($partenaire);
        } else {
            $commercial->setIdPartenaire(0);
        }

        return $commercial;
    }
}
