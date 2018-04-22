<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if(!$form->isSubmitted())
        $this->addFlash('info', 'Some info'
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $message = (new \Swift_Message('Hello Email'))
                ->setFrom($data['email'])
                ->setTo('maximzink@gmail.com')
                ->setBody(
                    $data['message'],
                    'text/plain'
                );

            $mailer->send($message);

            $this->addFlash("success", "Message send");
            return $this->redirectToRoute("form");



            dump($data);
        }
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
            'myForm' => $form->createView()
        ]);
    }


}
