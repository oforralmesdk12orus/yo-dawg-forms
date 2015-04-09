<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\First;
use AppBundle\Form\FirstType;

/**
 * First controller.
 *
 * @Route("/first")
 */
class FirstController extends Controller
{

    /**
     * Lists all First entities.
     *
     * @Route("/", name="first")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:First')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new First entity.
     *
     * @Route("/", name="first_create")
     * @Method("POST")
     * @Template("AppBundle:First:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new First();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('first_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a First entity.
     *
     * @param First $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(First $entity)
    {
        $form = $this->createForm(new FirstType(), $entity, array(
            'action' => $this->generateUrl('first_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new First entity.
     *
     * @Route("/new", name="first_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new First();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a First entity.
     *
     * @Route("/{id}", name="first_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:First')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find First entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing First entity.
     *
     * @Route("/{id}/edit", name="first_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:First')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find First entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a First entity.
    *
    * @param First $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(First $entity)
    {
        $form = $this->createForm(new FirstType(), $entity, array(
            'action' => $this->generateUrl('first_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing First entity.
     *
     * @Route("/{id}", name="first_update")
     * @Method("PUT")
     * @Template("AppBundle:First:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:First')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find First entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('first_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a First entity.
     *
     * @Route("/{id}", name="first_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:First')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find First entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('first'));
    }

    /**
     * Creates a form to delete a First entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('first_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
