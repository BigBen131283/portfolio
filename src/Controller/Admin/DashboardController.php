<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use App\Entity\Skills;
use App\Entity\Users;
use App\Entity\UserSkills;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProjectsCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Projects', 'fas fa-list', Projects::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user-pen', Users::class);
        yield MenuItem::linkToCrud('Skills', 'fas fa-kitchen-set', Skills::class);
        yield MenuItem::linkToCrud('User Skills', 'fas fa-percent', UserSkills::class);
        yield MenuItem::linkToRoute('Home', 'fas fa-list', 'home');
    }
}
