<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\TodoType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/todo", name="todo_index")
     */
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $todos = $entityManager->getRepository(Todo::class)->findAll();

        return $this->render('todo/index.html.twig', [
            'todos' => $todos
        ]);

    }


    /**
     * @Route("/todo/new", name="todo_new")
     */
    public function new(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $todo = new Todo();


        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $todo = $form->getData();

            $entityManager->persist($todo);
            $entityManager->flush();

            return $this->redirectToRoute('todo_index');
        }

        return $this->render('todo/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
