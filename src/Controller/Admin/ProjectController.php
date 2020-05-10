<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projects")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", methods="GET", name="admin_projects_index")
     */
    public function index(): Response
    {
        return $this->render('admin/project/index.html.twig', []);
    }
    
    /**
     * @Route("/new", methods="GET|POST", name="admin_post_new")
     */
    public function new(Request $request): Response
    {
        // $post = new Project();

        // $form = $this->createForm(ProjectType::class, $post)

        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($post);
            // $em->flush();

            // $this->addFlash('success', 'post.created_successfully');

            // return $this->redirectToRoute('admin_post_index');
        // }

        return $this->render('admin/project/new.html.twig', [
            // 'post' => $post,
            // 'form' => $form->createView(),
        ]);
    }
}