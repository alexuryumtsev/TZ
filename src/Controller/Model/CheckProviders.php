<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 20.09.2020
 * Time: 23:41
 */

namespace App\Controller\Model;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CheckProviders extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return int
     */
    public function checkProviders()
    {
        $query = $this->entityManager->createQuery("SELECT u.idProvider, p.name FROM App:Supplies u JOIN App:Providers p WHERE u.idProvider = p.id GROUP BY p.id HAVING COUNT(p.id) > 1");
        return $query->getResult();
    }
}