<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PartenaireController extends AbstractController
{
    #[Route('/partenaire', name: 'app_partenaire')]
    public function index(): Response
    {

        // if(isset($information_client_commercial_register) && isset($information_client_nom) && isset($information_client_prenom) && isset(information_client_compte_facturation)

        // && isset(strval($information_client_telephone)) && isset($information_client_email) && isset($information_client_contrat_marche
        //         ) && isset($information_client_raison_sociale) && isset($information_client_market_segment) && isset($information_client_localisation)
        //         && isset($offre_souscrite_mboa) && isset($offre_souscrite_cbCorporate) && isset($offre_souscrite_cbVpn) && isset(offre_souscrite_cbVot)
        //         && isset($nature_traveaux_telephone) && isset($nature_traveaux_internet) && isset($nature_traveaux_tv) && isset($information_installation_msan_dslam)
        //         && isset($information_installation_eside_eqn) && isset($information_installation_eid_r) && isset($information_installation_fsp_port) && isset($information_installation_fdt_sr)
        //         && isset($information_installation_fat_pc) && isset($information_installation_port_fat_pc) && isset($information_installation_port_olt_co) && isset($information_installation_coordonnees_gps)
        //         && isset($information_installation_nom_agent_technique) && isset($information_installation_signature_agent_technique) && isset($information_installation_date_agent_technique)
        //         && isset($materiel_techique_telephone) && isset($materiel_techique_conjonteur_femelle) && isset($materiel_techique_conjonteur_male) && isset($materiel_techique_conjonteur_tb) && isset($materiel_techique_cable_branchement)
        //         && isset($materiel_techique_poteau) && isset($materiel_techique_modem) && isset($materiel_techique_setup_box) && isset($materiel_techique_setup_mac) && isset($materiel_techique_ont_routeur) && isset($informationClientCommercialRegister)
        //         && isset($informationClientNom) && isset($informationClientPrenom) && isset($informationClientRaisonSociale) && isset($informationClientCompteFacturation) && isset($informationClientTelephone) && isset($informationClientEmail)
        //         && isset($informationClientContratMarche) && isset($informationClientMarketSegment) && isset($informationClientLocalisation) && isset($offreSouscriteMboa) && isset($offreSouscriteCbCorporate) && isset($offreSouscriteCbVpn)
        //         && isset($offreSouscriteCbVot) && isset($natureTraveauxTelephone) && isset($natureTraveauxInternet) && isset($natureTraveauxTv) && isset($natureTraveauxResponsableNom) && isset($natureTraveauDate) && isset($natureTraveauSignature) && isset($informationInstallationMsanDslam)
        //         && isset($informationInstallationEsideEqn) && isset($informationInstallationEidR) && isset($informationInstallationFspPort) && isset($informationInstallationFdtSr) && isset($informationInstallationFatPc) && isset($informationInstallationPortFatPc) && isset($informationInstallationPortOltCo) && isset($informationInstallationCoordonneesGps)
        //         && isset($informationInstallationNomAgentTechnique) && isset($informationInstallationSignatureAgentTechnique) && isset($informationInstallationDateAgentTechnique) && isset($informationInstallationZoneVlan) && isset($informationInstallationServiceVlan) && isset($informationInstallationNomPortSwitch)
        //         && isset($informationInstallationNomportrouteur) && isset($informationInstallationIpWanCpe) && isset($informationInstallationIpLanCpe) && isset($informationInstallationCompteAaa) && isset($informationInstallationNomAgent) && isset($informationInstallationSignature) && isset($informationInstallationDate) && isset($materielTechiqueTelephone)
        //         && isset($materielTechiqueConjonteurFemelle) && isset($materielTechiqueConjonteurMale) && isset($materielTechiqueConjonteurTb) && isset($materielTechiqueCableBranchement) && isset($materielTechiquePoteau) && isset($materielTechiqueModem) && isset($materielTechiqueSetupBox) && isset($materielTechiqueSetupMac) && isset($materielTechiqueOntRouteur)
        //        )

        //   "offre_souscrite_autre": "string",
        //   "nature_traveaux_installation": true,
        //   "nature_traveaux_transfert_ligne": true,
        //   "nature_traveaux_reconduction_ligne": true,
        //   "nature_traveaux_mise_ajour": true,
        //   "materiel_techique_autres": "string",
        //   "offreSouscriteAutre": "string",
        //   "natureTraveauxInstallation": true,
        //   "natureTraveauxTransfertLigne": true,
        //   "natureTraveauxReconductionLigne": true,
        //   "natureTraveauxMiseAjour": true,
        //   "materielTechiqueAutres": "string",
        //   "evaluationsClient": "string",
        //   "observations": "string"





        return $this->json("data", 200, [], ['groups' => '']);
    }
}
