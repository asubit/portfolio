<?php

namespace Asubit\Bundle\PortfolioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:index.html.twig');
    }

    public function aboutmeAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:aboutme.html.twig');
    }

    public function contactAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:contact.html.twig');
    }

    public function contactEnvoiAction()
    {
        if(!isset($_POST['name'])) {
            $this->get('session')->getFlashBag()->add('error', 'Nom obligatoire.');
        } else {
            $name = $_POST['name'];
        }
        if(!isset($_POST['email'])) {
            $this->get('session')->getFlashBag()->add('error', 'Email obligatoire.');
        } else {
            $email = $_POST['email'];
        }
        if(!isset($_POST['message'])) {
            $this->get('session')->getFlashBag()->add('error', 'Message obligatoire.');
        } else {
            $message = $_POST['message'];
        }
        if(!isset($_POST['subject'])) {
            $subject = "Pas de sujet";
        } else {
            $subject = $_POST['subject'];
        }
        $sujet = 'Contact Portfolio : '.$name.' - '.$subject.'.';
        $texte = 'Email : '.$email.'<br>Message : '.$message.'.';
        mail('antoine@subit.fr', $sujet, $texte);
        $this->get('session')->getFlashBag()->add('success', 'Votre demande à bien été envoyée!');
        return $this->render('AsubitPortfolioBundle:Default:contact.html.twig', array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'subject' => $subject,
            )
        );
    }
}
