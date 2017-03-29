<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bar;
use AppBundle\Entity\Contact;
use AppBundle\Entity\TypeBar;
use AppBundle\Form\BarType;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle::home.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('AppBundle::about.html.twig');
    }

    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $contact->setSenddate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $email = \Swift_Message::newInstance()
                ->setSubject("Message From : " . $contact->getName())
                ->setFrom($contact->getEmail())
                ->setTo('southwestfrancepools@gmail.com')
                ->setContentType("text/html")
                ->setBody(
                    $this->renderView(
                        'AppBundle:email:contact.html.twig',
                        array('contact' => $contact)
                    )
                );

            if (!$this->get('mailer')->send($email)) {
                $this->addFlash("email_fail", "Failed to send email message");
            } else {
                $this->addFlash("email_success", "Email sent !");
            }
        }

        return $this->render('AppBundle::contact.html.twig', array('form' => $form->createView()));
    }

    public function addBarTypeAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $newRole = new Bar();

        $roleForm = $this->createForm(
            new TypeBar(),
            $newRole,
            array('action' => $this->generateUrl('new_bar_type'),
                'method' => 'POST')
        );

        if ($request->isMethod('POST')) {
            $roleForm->handleRequest($request);

            if ($roleForm->isValid()) {
                $roleData = $roleForm->getData();

                $em->persist($roleData);
                $em->flush();

                $response = new Response(json_encode([
                    'success' => true,
                    'id' => $roleData->getId(),
                    'name' => $roleData->getName()
                ]));
                $response->headers->set('Content-Type', 'application/json');

                return $response;
            }
        }

        return $this->render("AppBundle:Contact:contact_role.html.twig", array(
            'form_role' => $roleForm->createView()
        ));
    }

    public function addBarAction(Request $request)
    {
        $bar = new Bar();
        $form = $this->get('form.factory')->create(BarType::class, $bar);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($bar);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Bar bien enregistrée.');

            return $this->redirectToRoute('add_bar');

        }
        $view = $form->createView();

        return $this->render('AppBundle::addBar.html.twig', array(
            'form' => $form->createView(),
        ));


    }

}
