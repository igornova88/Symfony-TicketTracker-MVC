<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class DefaultController extends AbstractController
{

    // /** KernelInterface $appKernel */
    // private $appKernel;

    // public function __construct(KernelInterface $appKernel)
    // {
    //     $this->appKernel = $appKernel;
    // }

    /**
     * @Route("/a")
    */
    public function number()
    {

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