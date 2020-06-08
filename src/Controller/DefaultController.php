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



    /**
     * @Route("/")
    */
    public function testPdf()
    {
        $privateFolder = realpath($this->getParameter('kernel.project_dir') . '/private');
        $excelFile = realpath($privateFolder . '/test-audit1.xlsx');
        // $excelFile = realpath($privateFolder . '/CADIF11082019.xlsm');





        // https://www.easyxls.com/manual/basics/export-to-xlsm-file-format.html
        // Create an instance of the class that exports Excel files
        // try {
            $workbook = new \com("EasyXLS.ExcelDocument");
        // }catch(\Exception $e) {
        //     echo $e->getMessage();
        // }

        // Load the XLSM template file
        // $workbook->easy_LoadXLSXFile($excelFile);

        // Add data to XLSM file
        // ...

        // Export XLSM file
        // $workbook->easy_WriteXLSXFile("C:\\Samples\\Macro filled with data.xlsm");




        // https://stackoverflow.com/questions/39333973/converting-excel-to-pdf-using-php
        // $xlapp =  new \COM("Excel.Application");
        dump($workbook);exit;
        // // dump($xlapp);exit;
        // // dump(1); exit;
        

        // // WORKBOOK AND WORKSHEET OBJECTS
        // $wbk = $xlapp->Workbooks->Open($excelFile);    
        // $wks = $wbk->Worksheets(1);

        // // SET CELL VALUE
        // $wks->Range("B8")->Value = "testing";

        // // OUTPUT WORKSHEET TO PDF
        // $xlTypePDF = 0;
        // $xlQualityStandard = 0;

        // $outputFile =  realpath($privateFolder . '\output.pdf');
        // try {

        //     $wbk->ExportAsFixedFormat($xlTypePDF, $outputFile, $xlQualityStandard, false, false);

        // } catch(com_exception $e) {  
        //     echo $e->getMessage()."\n";
        //     exit;

        // }

        // // OPEN WORKBOOK TO SCREEN
        // $xlapp->Visible = true;

        // // END PROCESS / FREE RESOURCES
        // $xlapp = NULL;
        // unset($xlapp);

        // dump('yes');exit;






//         $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($tempPathToFile);
//         /**  Create a new Reader of the type that has been identified  **/
//         $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
//         /**  Advise the Reader of which WorkSheets we want to load  **/
// //            $reader->setLoadSheetsOnly(['RECAP EXCEL', 'rapport']);

//         /**  Load $inputFileName to a Spreadsheet Object  **/
//         $spreadsheet = $reader->load($tempPathToFile);

//         $sheetDataRecap = $spreadsheet->getSheetByName('RECAP EXCEL');







        
            /**  Identify the type of $inputFileName  **/
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($excelFile);
            /**  Create a new Reader of the type that has been identified  **/
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

            /**  Load $inputFileName to a Spreadsheet Object  **/
            $spreadsheet = $reader->load($excelFile);
            
            $sheetDataRecap = $spreadsheet->getSheetByName('RECAP EXCEL');


            $sheetRapport = $spreadsheet->getSheetByName('rapport');
            // $sheetRapport->fromArray($data)
            // ->setCellValue('A1', 'Hello World !')
            // ->getPageSetup()
            // ->setFitToWidth(1)
            // ->setFitToHeight(0)
            // ->setOrientation('landscape');

            // $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");

            // $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $outputFile =  $privateFolder . '\output.pdf';

            $pdfwriter = new Dompdf($spreadsheet);
            $pdfwriter
        //        ->setOrientation('landscape')
                ->save($outputFile);
            dump($sheetDataRecap->getCell('A3')->getValue());exit;

        // try {

        // }
        // catch (\Exception $exception){
        
        
        //     echo $exception->getMessage();
            
        
        // }
        // dump('test');exit;
        // // throw new \Exception('Something went wrong!');
        // $number = random_int(0, 100);

        // $product = false;
        // // if (!$product) {
        //     // throw $this->createNotFoundException('The product does not exist');
    
        //     // the above is just a shortcut for:
        //     // throw new NotFoundHttpException('The product does not exist');
        // // }
        // return $this->render('dashboard/page.html.twig', [
        //     'number' => $number,
        // ]);
    }







}