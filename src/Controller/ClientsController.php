<?php
// api/src/Controller/CreateMediaObjectAction.php
namespace App\Controller;

use App\Entity\Clients;
use App\Repository\CommerciauxRepository;
use App\Repository\PartenairesRepository;
use App\Service\MailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class ClientsController extends AbstractController
{
    public function __construct(private MailService $mailService, private PartenairesRepository $partenairesRepository, private CommerciauxRepository $commerciauxRepository)
    {
    }
    public function __invoke(Request $request): Clients
    {
        $fileRecto = $request->files->get('file_recto');
        $fileVerso = $request->files->get('file_verso');
        $profilePhoto = $request->files->get('file_profil');
        $client = new Clients();
        $client->setCreatedAt(new \DateTimeImmutable());
        $client->setVille($request->request->get('ville'));
        $client->setRegion($request->request->get('region'));
        $client->setLocalisation($request->request->get('localisation'));
        $client->setEmail($request->request->get('email'));
        $client->setCni($request->request->get('cni'));
        $client->setFileVerso($fileVerso);
        $client->setUpdatedAt(new \DateTimeImmutable());
        $client->setTypeClient($request->request->get('type_client'));
        $client->setFileRecto($fileRecto);
        $client->setUpdatedAt(new \DateTimeImmutable());
        $client->setCniPhotoRecto("sdfsdsdgdf");
        $client->setCniPhotoVerso("hjhjhjh");
        $client->setPhotoProfile("gfdgdfg");
        $client->setFileProfile($profilePhoto);
        $client->setUpdatedAt(new \DateTimeImmutable());
        $client->setNom($request->request->get('nom'));
        $client->setTelephoneUn($request->request->get('telephone_un'));
        $commerialId = intval($request->request->get('commercial_id'));
        $partenaireId = intval($request->request->get('partenaire_id'));
        if ($partenaireId !== 0 && $partenaireId !== null) {
            $partenaire = $this->partenairesRepository->find($partenaireId);
            $client->setPartenaire($partenaire);
            $client->setIdPartenaire($partenaireId);
        } else {
            $client->setIdPartenaire(0);
        }

        if ($commerialId !== 0 && $commerialId !== null) {
            $commerial = $this->commerciauxRepository->find($commerialId);
            $client->setCommercial($commerial);
            $client->setIdCommercial($commerialId);
        } else {
            $client->setIdCommercial(0);
        }
        if ($request->request->get('telephone_deux') !== null) {
            $client->setTelephoneUn($request->request->get('telephone_deux'));
        }
        if ($request->request->get('telephone_trois') !== null) {
            $client->setTelephoneUn($request->request->get('telephone_trois'));
        }
        $client->setOffreChoisie($request->request->get('offre_choisie'));
        if ($request->request->get('souscription_id') !== null) {
            $client->setSouscriptionId($request->request->get('souscription_id'));
        }

        if ($request->request->get('signature') !== null) {
            $client->setSignature($request->request->get('souscription_id'));
        }

        if ($request->request->get('nom_partenaire') !== null) {
            $client->setNomPartenaire($request->request->get('nom_partenaire'));
        }

        if ($request->request->get('registre_commerce') !== null) {
            $client->setRegistreCommerce($request->request->get('registre_commerce'));

            $fileRegistrerecto = $request->files->get('file_registre_recto');
            $client->setFileRegistreRecto($fileRegistrerecto);
            $client->setUpdatedAt(new \DateTimeImmutable());
            $fileRegistreVerso = $request->files->get('file_registre_verso');
            $client->setFileRegistreVerso($fileRegistreVerso);
            $client->setUpdatedAt(new \DateTimeImmutable());
        }

        // $this->mailService->send($request->request->get('email'), "sujet", "client", ["username" => $request->request->get('nom'), "offre" => $request->request->get('offre_choisie')]);
        return $client;
    }
}
