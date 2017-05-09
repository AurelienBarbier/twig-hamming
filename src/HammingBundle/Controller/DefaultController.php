<?php

namespace HammingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {

    	$form = $this->createFormBuilder()
    	->add('string1',         TextType::class)
    	->add('string2',    TextType::class)
    	->add('Execute',         SubmitType::class)
    	->getForm();

		  // Hydrate notre objet avec la donnée du formulaire
    	$form->handleRequest($request);

    	// Si method POST et si le form est valid
    	if ($form->isSubmitted() && $form->isValid()) {
    		$data = $form->getData();

	   		// Puis on traite la donnée (envoi de mail…)
    		return $this->render('HammingBundle:Default:hammer.html.twig', [
    			'data' => $data
    			]);
    	} 



    	return $this->render('HammingBundle:Default:index.html.twig', [
    		'my_form' => $form->createView()
    		]);
    }

}
