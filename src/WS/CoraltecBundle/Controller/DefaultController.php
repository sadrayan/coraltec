<?php

namespace WS\CoraltecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WS\CoraltecBundle\Entity\Contact;
use WS\CoraltecBundle\Form\Type\ContactType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // load product page.
        return $this->render('WSCoraltecBundle:Default:index.html.twig');
    }

    /**
     *
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);



        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {



                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo('contact@example.com')
                    ->setBody(
                        $this->renderView(
                            'WSCoraltecBundle:Mail:.html.twig.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return $this->render('WSCoraltecBundle:Contact:index.html.twig',
            array('form' => $form->createView()
        ));
    }

    public function aboutAction(){
        return $this->render('WSCoraltecBundle:Default:about.html.twig');
    }

    public function serviceAction(){
        return $this->render('WSCoraltecBundle:Default:service.html.twig');
    }

}
