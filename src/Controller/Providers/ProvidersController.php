<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 20.09.2020
 * Time: 0:59
 */

namespace App\Controller\Providers;

use App\Controller\Forms\FormCreateController;
use App\Entity\Products;
use App\Entity\Providers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProvidersController extends AbstractController
{
    public function provides(Request $request)
    {
        $provides = new Providers();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(FormCreateController::class, $provides);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $em->persist($task);
            $em->flush();
            $this->addFlash('notice', 'Новый поставщик успешно добавлен!');
            return $this->redirectToRoute('provider');
        }

        return $this->render('providers/providers.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}