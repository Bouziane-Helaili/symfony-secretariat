<?php

namespace App\Controller\Admin;

use App\Entity\CategoryFilesUser;
use App\Entity\Compagny;
use App\Entity\Status;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mon assistante pro')
            ->setTranslationDomain('admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        // yield MenuItem::section('Tasks');
        yield MenuItem::subMenu('Listes des tâches', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Liste des tâches', 'fas fa-eye', Task::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud("Création d'une tâche", 'fas fa-plus', Task::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Les entreprises', 'fas fa-list', Compagny::class)->setSubItems([
            MenuItem::linkToCrud('Liste des entreprises', 'fas fa-eye', Compagny::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud("Ajouter une entreprise", 'fas fa-plus', Compagny::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Les employes', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Liste des employés', 'fas fa-eye', User::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud("Ajouter un employé", 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Les stagiaires', 'fas fa-list');
// Lien dans le menu en attendant de de mettre un Crud pour les stagiaires
       
        yield MenuItem::subMenu('les statuts des stagiaires', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Liste des statuts', 'fas fa-eye', Status::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud("Ajouter un statut", 'fas fa-plus', Status::class)->setAction(Crud::PAGE_NEW)
        ]);


        yield MenuItem::subMenu('Les catégories de téléchargement', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Liste des catégories', 'fas fa-eye', CategoryFilesUser::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud("Ajouter une catégories", 'fas fa-plus', CategoryFilesUser::class)->setAction(Crud::PAGE_NEW)
        ]);
    }
}
