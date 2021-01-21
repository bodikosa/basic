<?php

namespace App\Controller;

use App\Entity\ListEntity;
use App\Form\ListEntityType;
use App\Repository\ListEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/list")
 */
class ListEntityController extends AbstractController
{
    /**
     * @Route("/", name="list_index", methods={"GET"})
     */
    public function index(ListEntityRepository $listEntityRepository): Response
    {
        return $this->json($listEntityRepository->findAll());
    }

    /**
     * @Route("/new", name="list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $listEntity = new ListEntity();
        $form = $this->createForm(ListEntityType::class, $listEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listEntity);
            $entityManager->flush();

            return $this->redirectToRoute('list_index');
        }

        return $this->render('list/new.html.twig', [
            'list' => $listEntity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="list_show", methods={"GET"})
     */
    public function show(ListEntity $listEntity): Response
    {
        return $this->render('list/show.html.twig', [
            'list' => $listEntity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ListEntity $listEntity): Response
    {
        $form = $this->createForm(ListEntityType::class, $listEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('list_index');
        }

        return $this->render('list/edit.html.twig', [
            'list' => $listEntity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ListEntity $listEntity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listEntity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($listEntity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('list_index');
    }
}
