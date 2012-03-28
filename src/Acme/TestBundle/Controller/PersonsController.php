<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\TestBundle\Entity\Persons;
use Acme\TestBundle\Form\PersonsType;

/**
 * Persons controller.
 *
 */
class PersonsController extends Controller
{
    /**
     * Lists all Persons entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcmeTestBundle:Persons')->findAll();

        return $this->render('AcmeTestBundle:Persons:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Persons entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:Persons')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persons entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeTestBundle:Persons:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Persons entity.
     *
     */
    public function newAction()
    {
        $entity = new Persons();
        $form   = $this->createForm(new PersonsType(), $entity);

        return $this->render('AcmeTestBundle:Persons:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Persons entity.
     *
     */
    public function createAction()
    {
        $entity  = new Persons();
        $request = $this->getRequest();
        $form    = $this->createForm(new PersonsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('persons_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('persons'));
            
        }

        return $this->render('AcmeTestBundle:Persons:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Persons entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:Persons')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persons entity.');
        }

        $editForm = $this->createForm(new PersonsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeTestBundle:Persons:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Persons entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:Persons')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persons entity.');
        }

        $editForm   = $this->createForm(new PersonsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('persons_edit', array('id' => $id)));
        }

        return $this->render('AcmeTestBundle:Persons:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Persons entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AcmeTestBundle:Persons')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Persons entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('persons'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
