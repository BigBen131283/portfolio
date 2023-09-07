<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Myprojects;
use App\Form\ProjectType;
use App\Repository\MyprojectsRepository;
use App\Services\Uploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/home', name: 'adminhome')]
    public function index(
    ): Response
    {
       
        return $this->render('admin/index.html.twig', [

        ]);
    }

    #[Route('/project', name: 'adminproject')]
    public function createProject(
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
        
        $repository = $em->getRepository(Myprojects::class);
        $projectList = $repository->findAll();

        return $this->render('admin/project.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'projectList' => $projectList
        ]);
    }
    #[Route('/project/update/{id}', name: 'updateproject')]
    public function updateProject(
        int $id,
        EntityManagerInterface $em,
        Request $request,
        Uploader $uploader
    ): Response
    {
        $proj = $em->getRepository(Myprojects::class)->find($id);


        
        // $project = new Myprojects();
        $form = $this->createForm(ProjectType::class, $proj);
        $form->handleRequest($request);

        
        if($form->isSubmitted() && $form->isValid()){
            $path = $form->get('picture')->getData();
            $filename = $uploader->uploadFile($path, 'images');
            $proj->setPicture($filename);
            $em->persist($proj);
            $em->flush();
        }
        
        $repository = $em->getRepository(Myprojects::class);
        $projectList = $repository->findAll();

        return $this->render('admin/project.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'projectList' => $projectList
        ]);
    }
    #[Route('/project/delete/{id}', name: 'deleteproject')]
    public function deleteProject(
        int $id,
        EntityManagerInterface $em,
    ): Response
    {
        $proj = $em->getRepository(Myprojects::class)->find($id);
        $em->getRepository(Myprojects::class)->remove($proj, true);

        
        $project = new Myprojects();
        $form = $this->createForm(ProjectType::class, $project);
        
        $repository = $em->getRepository(Myprojects::class);
        $projectList = $repository->findAll();

        return $this->render('admin/project.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'projectList' => $projectList
        ]);
    }
}
