<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 20.09.2020
 * Time: 10:52
 */

namespace App\Controller\Supplies;

use App\Controller\Model\CheckProviders;
use App\Entity\Supplies;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuppliesController extends AbstractController
{
    public function supplies(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $supplies = new Supplies();
        $form = $this->createForm(SuppliesFormController::class, $supplies);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $supplies->setIdProduct($task->idProduct[0]->id);
            $supplies->setIdProvider($task->idProvider[0]->id);

            $em->persist($supplies);
            $em->flush();
            $this->addFlash('notice', 'Поставка успешно добавлена!');
            return $this->redirectToRoute('supplies');
        }

        $checkProviders = new CheckProviders($em);
        $providers = $checkProviders->checkProviders();

        return $this->render('supplies/supplies.html.twig', [
            'form' => $form->createView(),
            'providers' => $providers ?? null,
        ]);
    }

}