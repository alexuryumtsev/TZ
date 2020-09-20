<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 20.09.2020
 * Time: 1:05
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function default()
    {
        return $this->render('base.html.twig');
    }
}