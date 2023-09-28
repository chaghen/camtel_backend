<?php
// api/src/Controller/CreateMediaObjectAction.php
namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class UploadController extends AbstractController
{
    public function __invoke(Request $request): Client
    {
        $fileRecto = $request->files->get('file_recto');
        $fileVerso = $request->files->get('file_verso');
        // if (!$uploadedFile) {
        //     throw new BadRequestHttpException('"file" is required');
        // }


        $client = new Client();
        $client->setCreatedAt(new \DateTimeImmutable());
        $client->setRegion($request->request->get('region'));
        $client->setVille($request->request->get('ville'));
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
        $client->setNom($request->request->get('nom'));
        $client->setTelephoneUn($request->request->get('telephone_un'));
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


        return $client;
    }
}
