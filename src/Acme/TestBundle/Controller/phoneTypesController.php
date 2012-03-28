<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\TestBundle\Entity\phoneTypes;
use Acme\TestBundle\Form\phoneTypesType;

/**
 * phoneTypes controller.
 *
 */
class phoneTypesController extends Controller
{
    /**
     * Lists all phoneTypes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcmeTestBundle:phoneTypes')->findAll();

        return $this->render('AcmeTestBundle:phoneTypes:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a phoneTypes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:phoneTypes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find phoneTypes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeTestBundle:phoneTypes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new phoneTypes entity.
     *
     */
    public function newAction()
    {
        $entity = new phoneTypes();
        $form   = $this->createForm(new phoneTypesType(), $entity);

        return $this->render('AcmeTestBundle:phoneTypes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new phoneTypes entity.
     *
     */
    public function createAction()
    {
        $entity  = new phoneTypes();
        $request = $this->getRequest();
        $form    = $this->createForm(new phoneTypesType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('phonetypes_show', array('id' => $entity->getId())));
            
        }

        return $this->render('AcmeTestBundle:phoneTypes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing phoneTypes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:phoneTypes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find phoneTypes entity.');
        }

        $editForm = $this->createForm(new phoneTypesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeTestBundle:phoneTypes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing phoneTypes entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcmeTestBundle:phoneTypes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find phoneTypes entity.');
        }

        $editForm   = $this->createForm(new phoneTypesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('phonetypes_edit', array('id' => $id)));
        }

        return $this->render('AcmeTestBundle:phoneTypes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a phoneTypes entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AcmeTestBundle:phoneTypes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find phoneTypes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('phonetypes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
