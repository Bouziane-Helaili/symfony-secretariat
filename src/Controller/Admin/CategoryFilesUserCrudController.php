<?php

namespace App\Controller\Admin;

use App\Entity\CategoryFilesUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryFilesUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategoryFilesUser::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          
            TextField::new('category'),
            ChoiceField::new('type')->setChoices([
                'Entreprise' => 'Entreprise',
                'Employé' => 'Employé',
                'Stagiaire' => 'Stagiaire',
            ])
        ];
    }
    
}
