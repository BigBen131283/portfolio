<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Myprojects;
use App\Form\ProjectType;
use App\Services\Uploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        EntityManagerInterface $em,
        Request $request,
        Uploader $uploader
    ): Response
    {
        $project = new Myprojects();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $path = $form->get('picture')->getData();
            $filename = $uploader->uploadFile($path, 'images');
            $project->setPicture($filename);
            $em->persist($project);
            $em->flush();
        }
        
        return $this->render('admin/project.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView()
        ]);
    }
}
