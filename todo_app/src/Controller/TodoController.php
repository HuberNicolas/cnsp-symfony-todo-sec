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
        $user = $this->getUser();

        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            $todos = $entityManager->getRepository(Todo::class)->findAll();
        }
        else {
            $todos = $entityManager->getRepository(Todo::class)->findBy(['belongs_to' => $user]);
        }

        return $this->render('todo/index.html.twig', [
            'todos' => $todos,
            'user' => $user,
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

    /**
     * @Route("/todo/edit/{id}", name="todo_edit",  requirements={"id"="\d+"})
     */
    public function edit(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $user = $this->getUser();
        $todo = $entityManager->getRepository(Todo::class)->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('Unable to find entity!');
        }

        if ($todo->getBelongsTo() != $user && !in_array('ROLE_ADMIN', $user->getRoles())) {
            throw $this->createNotFoundException('This todo item does not belong to you!');
        }

        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!in_array('ROLE_ADMIN', $user->getRoles())) {
                $todo->setBelongsTo($user);
            }

            $entityManager->flush();
            return $this->redirectToRoute('todo_index');
        }

        return $this->render('todo/edit.html.twig', [
            'todo' => $todo,
            'form' => $form->createView(),
        ]);

    }

}
