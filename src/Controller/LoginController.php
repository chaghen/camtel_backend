<?php
// api/src/Controller/CreateMediaObjectAction.php
namespace App\Controller;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\CommerciauxRepository;
use App\Repository\TechniciensRepository;
use App\Repository\PartenairesRepository;
use App\Service\MailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class LoginController extends AbstractController
{
    public function __construct(private MailService $mailService, private PartenairesRepository $partenairesRepository, private TechniciensRepository $technicienRepository, private UserPasswordHasherInterface $passwordEncode, private CommerciauxRepository $commerciauxRepository)
    {
    }

    #[Route('/login', name: 'app_login')]
    public function login(Request $request, UserPasswordHasherInterface $passwordHasher,)
    {
        $content = json_decode($request->getContent(), true);

        $password = $content['password'];
        $email = $content['email'];
        $typeCompte = $content['type_compte'];
        // $password =  $request->request->get('password');
        // $email = $request->request->get('email');

        // $typeCompte = $request->request->get('type_compte');

        if ($typeCompte == "partenaires") {
            $user =  $this->partenairesRepository->findOneBy(['email' => $email]);
            $match_user = $passwordHasher->isPasswordValid($user,  $password);
            if ($match_user) {
                $data = ["id" => $user->getId(), "idEntreprise" => $user->getId(), "role" => $user->getRole()];
                return $this->json([$data, 200]);
            } else {
                return $this->json(["vos identifiants ne matchent pas", 404]);
            }
        } else if ($typeCompte == "techniciens") {
            $user =  $this->technicienRepository->findOneBy(['email' => $email]);
            $match_user = $passwordHasher->isPasswordValid($user,  $password);
            if ($match_user) {
                $data = ["id" => $user->getId(), "idEntreprise" => $user->getId(), "role" => $user->getRole()];
                return $this->json([$data, 200]);
            } else {
                return $this->json(["vos identifiants ne matchent pas", 404]);
            }
        } else if ($typeCompte == "commerciaux") {
            $user =  $this->commerciauxRepository->findOneBy(['email' => $email]);
            $match_user = $passwordHasher->isPasswordValid($user,  $password);
            if ($match_user) {
                $data = ["id" => $user->getId(), "idEntreprise" => $user->getId(), "role" => $user->getRole()];
                return $this->json([$data, 200]);
            } else {
                return $this->json(["vos identifiants ne matchent pas", 404]);
            }
        } else if ($typeCompte == "admin") {
            $user =  $this->partenairesRepository->findOneBy(['email' => $email]);
            $match_user = $passwordHasher->isPasswordValid($user,  $password);
            if ($match_user) {
                $data = ["id" => $user->getId(), "idEntreprise" => $user->getId(), "role" => $user->getRole()];
                return $this->json([$data, 200]);
            } else {
                return $this->json(["vos identifiants ne matchent pas", 404]);
            }
        } else {
            return $this->json(["identifiants incorrectes", 401]);
        }
    }
}
