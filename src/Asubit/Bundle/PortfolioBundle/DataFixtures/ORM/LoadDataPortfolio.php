<?php

namespace Asubit\Bundle\PortfolioBundle\DataFixtures\ORM;

// SYMFONY FIXTURES DEPENDANCES
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Doctrine\UserManager;

use Asubit\Bundle\UserBundle\Entity\User;
use Asubit\Bundle\PortfolioBundle\Entity\Work;
use Asubit\Bundle\PortfolioBundle\Entity\Category;


class LoadApplicationData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Admin
        $userManager = $this->container->get('fos_user.user_manager');

        $admin = $userManager->createUser();
        $admin->setUsername('admin')
            ->setPlainPassword('admin')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('admin@admin.pro')
            ->setFirstName('Antoine')
            ->setLastName('SUBIT')
            ->setEnabled(true);
        $userManager->updateUser($admin, true);
        $manager->flush();

        // Portfolio Catégories
        $c1 = new Category(); $c1->setName('Développement')->setNameCanonical('developpement'); $manager->persist($c1);
        $c2 = new Category(); $c2->setName('Référencement')->setNameCanonical('referencement'); $manager->persist($c2);
        $c3 = new Category(); $c3->setName('Intégration & Graphisme')->setNameCanonical('integration-graphisme'); $manager->persist($c3);
        $c4 = new Category(); $c4->setName('Print & PAO')->setNameCanonical('print-pao'); $manager->persist($c4);
        $manager->flush();

        // Portfolio Works
        // DEV
        $w = new Work();
        $w->setCategory($c1)
            ->setDateCreation(new \DateTime())
            ->setName('Observatoire des coûts de construction')
            ->setDescription("Avec un modèle de conception complexe cette application est entièrement paramétrable via une partie administration. Un système de calcul de note sur 100 en fonction de critères différents à été mis en place pour pouvoir comparer les opérations immobilières de même complexité entre elles.")
            ->setShortDescription("Application permettant de comparer les coûts de construction des opérations immobilières d'un organisme ou Groupe d'organisme avec l'ensemble du marché immobilier.")
            ->setClient('Kurt Salmon')
            ->setTool('Symfony2')
            ->setTags(array('Twig','POO','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('symfony/observatoire-cout-construc-symfony.png'))
            ->setThumbnail('symfony/observatoire-cout-construc-symfony.png')
            ->setLinkpreview('http://www.observatoire-couts-construction.fr');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c1)
        ->setDateCreation(new \DateTime())
            ->setName('Porteur de protèse')
            ->setDescription("Information du chiurgien, de son établissement, infos du patient, tout est sur la carte. Partie Admin où on peut gérer le fond de la carte, la position des éléments sur la carte, le recto/verso, etc ... Relié à une imprimante spécialisée qui imprime directement la carte générée (format carte bleue).")
            ->setShortDescription("Application permettant de créer et d'éditer des cartes pour les patients portant des prothèses, avec les coordonnées de leurs chiurgiens et leur établissement en cas de problème dans les aéroports, transports, ...")
            ->setClient('Cabinet chirurgical SELMI')
            ->setTool('Symfony2')
            ->setTags(array('Twig','POO','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('symfony/porteur-prothese-symfony.png'))
            ->setThumbnail('symfony/porteur-prothese-symfony.png')
            ->setLinkpreview('http://porteur-prothese.com');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c1)
            ->setDateCreation(new \DateTime())
            ->setDescription("Petite application simple mais terriblement efficace, avec envoi de mail pour rappel de relance et gestion des candidatures ainsi que des outils de conseils et de gestion de contact pour développer son réseau professionnel.")
            ->setShortDescription("Application permettant de gérer la recherche et le suivi de la recherche d'emploi. L'accend est mis sur l'ergonomie et la simplicité d'utilisation.")
            ->setName('Monitoring Job Search')
            ->setClient('Projet personnel')
            ->setTool('Symfony2')
            ->setTags(array('Twig','POO','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('symfony/monitoring-job-search-symfony.png'))
            ->setThumbnail('symfony/monitoring-job-search-symfony.png')
            ->setLinkpreview('https://bitbucket.org/asubit/mjs');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c1)
            ->setDateCreation(new \DateTime())
            ->setDescription("Gestion de projet.")
            ->setShortDescription("CRM")
            ->setName('Girafon Project')
            ->setClient('Projet personnel')
            ->setTool('Symfony2')
            ->setTags(array('Twig','POO','PHP','MySQL','HTML','CSS'))
            ->setLinkpreview('https://bitbucket.org/asubit/girafon-project');
        $manager->persist($w);
        // REFERENCEMENT
        $w = new Work();
        $w->setCategory($c2)
        ->setDateCreation(new \DateTime())
        ->setName("Objets publicitaires sur-mesure")->setClient('Promoplus')->setLinkpreview('http://www.promoplus.fr'); $manager->persist($w);
        // INTE ET GRAPH
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Graphisme réalisé par : David Bourgeon (www.be.net/ESthegraphe). Mise en place de Wordpress. Réalisation d'un template personnalisé adapté aux besoins du client conformement à la charte graphique. Optimisation référencement naturel")
            ->setShortDescription("Site internet pour l'AAEP de la tour de Salvagny, Wordpress - Thème personnalisé.")
            ->setName('AAEP')
            ->setClient("Association des Amis de l'École Publique, Association de la Tour de Salvagny, 69")
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/aaep-mini.png'))
            ->setThumbnail('wordpress/aaep-mini.png')
            ->setLinkpreview('http://www.aaeplatour.org');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création du graphisme. Mise en place de Wordpress. Réalisation d'un template personnalisé. Intégration graphique. Optimisation référencement naturel")
            ->setShortDescription("Site institutionnel pour promouvoir l'association et mettre à disposition des membres les documents technique et les cours.")
            ->setName("L'OF")
            ->setClient("L'Objectif Feuillantin, Club photo de La Fouillouse, 42")
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/lof-mini.png'))
            ->setThumbnail('wordpress/lof-mini.png')
            ->setLinkpreview('http://objectif-feuillantin.fr');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création du graphisme. Mise en place de Wordpress. Réalisation d'un template personnalisé. Intégration graphique. Optimisation référencement naturel")
            ->setShortDescription("Site officiel de la commune de PÉRIGNEUX. Créé selon les normes d'accessibilité RGAA. Calendrier d'évènements et actualités rescentes de la commune. Site multi-utilisateurs")
            ->setName('Périgneux')
            ->setClient('Mairie de Périgneux, Administration Publique Française, 42')
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/perigneux-mini.png'))
            ->setThumbnail('wordpress/perigneux-mini.png')
            ->setLinkpreview('http://www.perigneux.fr');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création du graphisme. Mise en place de Wordpress. Réalisation d'un template personnalisé. Intégration graphique. Optimisation référencement naturel")
            ->setShortDescription("Site institutionnel pour promouvoir l'association et mettre à disposition des membres les documents d'adhésion et autres.")
            ->setName('PARACOR')
            ->setClient('PARACOR Rhône-Alpes, Association de Lyon, 69')
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/paracor-mini.png'))
            ->setThumbnail('wordpress/paracor-mini.png')
            ->setLinkpreview('http://www.paracor-rhonealpes.fr');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Graphisme réalisé par : David Bourgeon (www.be.net/ESthegraphe). Mise en place de Wordpress. Réalisation d'un template personnalisé adapté aux besoins du client conformement à la charte graphique. Optimisation référencement naturel")
            ->setShortDescription("Site institutionnel développé avec Wordpress. Thème personnalisé réalisé sur-mesure. Diaporama, galerie photos et formulaire de contact")
            ->setName('Opération Pamplemousses')
            ->setClient('Opération Pamplemousses, Association scolaire, National')
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/op-mini.png'))
            ->setThumbnail('wordpress/op-mini.png')
            ->setLinkpreview('http://www.operation-pamplemousses.com');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création du graphisme. Mise en place de Wordpress. Réalisation d'un template personnalisé. Intégration graphique. Optimisation référencement naturel")
            ->setShortDescription("Site institutionnel développé avec Wordpress. Thème personnalisé réalisé sur-mesure. Diaporama en plein écran et formulaire de contact")
            ->setName('IMV Production')
            ->setClient('IMV Production, Société individuelle, 69')
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/imv-prod-mini.png'))
            ->setThumbnail('wordpress/imv-prod-mini.png')
            ->setLinkpreview('http://www.imv-production.com');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création du graphisme. Mise en place de Wordpress. Réalisation d'un template personnalisé. Intégration graphique. Optimisation référencement naturel")
            ->setShortDescription("Blog sur les techniques du web, tutoriels pour utilisation de logiciels, de CMS ou de langage de programmation.")
            ->setName('WebCréateur')
            ->setClient('WebCréateur, Blog personnel')
            ->setTool('Wordpress')
            ->setTags(array('PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('wordpress/webcreateur-mini.png'))
            ->setThumbnail('wordpress/webcreateur-mini.png')
            ->setLinkpreview('http://webcreateur.net');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c3)
            ->setDateCreation(new \DateTime())
            ->setDescription("Participation à la mise en place du CMS et à la configuration. Contribution à l'intégration.")
            ->setShortDescription("Site réalisé par Michèle Lédée. Basé sur un projet scolaire, création d'un site commercial sous le CMS Drupal 7.")
            ->setName("Rékup' & Rémoi")
            ->setClient("Projet d'étude")
            ->setTool('Drupal')
            ->setTags(array('HTML','CSS'))
            ->setPhotos(array('drupal/rekup-mini.png'))
            ->setThumbnail('drupal/rekup-mini.png')
            ->setLinkpreview('http://michele-ledee.fr/rekup-et-remoi');
        $manager->persist($w);
        // PRINT ET PAO
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création d'une charte graphique pour l'Office de tourisme du Pays de Saint-Galmier dans le cadre d'un stage.
            Réalisation d'une banderole, du balisages, des affiches A4 et de l'encart publicitaire publié dans l'Agenda Stéphanois.")
            ->setLinkpreview("http://www.lagenda.net/saintetienne/")
            ->setName("Randonnée des 2 chateaux")
            ->setClient("OTPSG, Office du Tourisme du Pays de Saint Galmier, 42")
            ->setTool('Photoshop')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/2chato_carte.jpg','print-pao/full/2chato_circuit.jpg','print-pao/full/2chato_pub.jpg'))
            ->setThumbnail('print-pao/creation-print-2-chateaux.png');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création d'un dépliant touristique. Création de la première de couverture d'un dépliant touristique pour la ville du Puy-en-Velay dans le cadre de mon DUT.")
            ->setLinkpreview("http://www.lepuyenvelay.fr")
            ->setName("Le Puy-en-Velay Tourisme")
            ->setClient("Le Puy Tourisme, Office du Tourisme du Puy-en-Velay, 43")
            ->setTool('Photoshop')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/depliant.jpg'))
            ->setThumbnail('print-pao/creation-print-depliant-touristique.png');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création de tract A5. Mise en page de tract pour Forez Tourisme dans le cadre d'un stage. Réalisation sous Photoshop et InDesign. Gestion et suivi du projet jusqu'a la distribution.")
            ->setLinkpreview("http://www.foreztourisme.fr")
            ->setName("Forez Tourisme")
            ->setClient("Forez Tourisme")
            ->setTool('Illustrator')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/avousleforez.jpg'))
            ->setThumbnail('print-pao/creation-print-tracts-avousleforez.png');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création d'une affiche A4. Recherche et création originale dans le cadre du concours d'affichiste de l'ICAM édition 2010. 2ème place sur 129 participants.")
            ->setLinkpreview("http://www.festival-icam.fr")
            ->setName("Festival ICAM")
            ->setClient("Concours d'affichistes ICAM")
            ->setTool('Photoshop')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/icam.jpg'))
            ->setThumbnail('print-pao/creation-print-affiche-festival-icam.png');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Création de tract. Création du canevas des programmes du Centre Culturel de Saint-Germain Laprade.")
            ->setLinkpreview("http://www.saint-germain-laprade.fr/sgl/centre_culturel.html")
            ->setName("CC Saint Germain Laprade")
            ->setClient("Centre Culturel de Saint Germain Laprade")
            ->setTool('InDesign, Photoshop')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/mardi_culture_rouge.jpg','print-pao/full/mardi_culture_violet.jpg',''))
            ->setThumbnail('print-pao/creation-print-laprade.png');
        $manager->persist($w);
        $w = new Work();
        $w->setCategory($c4)
            ->setDateCreation(new \DateTime())
            ->setDescription("Recherche et création d'un photomontage sous Adobe Photoshop sur l'association de la beauté de la nature et l'art.")
            ->setName("Art & Nature")
            ->setClient("Projet d'étude")
            ->setTool('Photoshop')
            ->setTags(array('Smarty','PHP','MySQL','HTML','CSS'))
            ->setPhotos(array('print-pao/full/papillion.jpg'))
            ->setThumbnail('print-pao/creation-print-photomontage.png');
        $manager->persist($w);
        $manager->flush();
    }

    /*public function ajouteImagesProduit(Produit &$entity)
    {
        $array = array('FLACON', 'eLiquide', '_');
        $entity->settitre(str_replace($array, '', $entity->gettitre()))->setimagemini(str_replace(' ', '', $entity->getimagemini()));
    }*/

    public function getOrder()
    {
        return 0;
    }
}
