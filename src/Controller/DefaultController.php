<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/a")
    */
    public function number()
    {
        // throw new \Exception('Something went wrong!');
        $number = random_int(0, 100);

        $product = false;
        // if (!$product) {
            // throw $this->createNotFoundException('The product does not exist');
    
            // the above is just a shortcut for:
            // throw new NotFoundHttpException('The product does not exist');
        // }
        return $this->render('dashboard/page.html.twig', [
            'number' => $number,
        ]);
    }
}