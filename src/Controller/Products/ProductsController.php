<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 19.09.2020
 * Time: 23:32
 */

namespace App\Controller\Products;

use App\Controller\Forms\FormCreateController;
use App\Entity\Products;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProductsController extends AbstractController
{
    public function products(Request $request)
    {
        $products = new Products();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(FormCreateController::class, $products);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $em->persist($task);
            $em->flush();
            $this->addFlash('notice', 'Новый продукт успешно добавлен!');
            return $this->redirectToRoute('product');
        }

        return $this->render('products/product.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}