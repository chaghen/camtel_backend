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


class LoginController extends AbstractController
{
    public function __construct(private MailService $mailService, private PartenairesRepository $partenairesRepository, private TechniciensRepository $commerciauxRepository, private UserPasswordHasherInterface $passwordEncode)
    {
    }

    // public function __invoke(Request $request): Login
    // {
    //     $password =  $request->request->get('password');
    //     $email = $request->request->get('email');
    //     $typeCompte = $request->request->get('type_compte');

    //     if ($typeCompte == "") {
    //     }
    //     return $technicien;
    // }
}
