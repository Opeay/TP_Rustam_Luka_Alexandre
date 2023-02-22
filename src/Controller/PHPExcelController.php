<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\Role;



class PHPExcelController extends AbstractController
{
    #[Route('/p/h/p/excel', name: 'app_p_h_p_excel')]
    public function index(): Response
    {
        return $this->render('php_excel/index.html.twig', [
            'controller_name' => 'PHPExcelController',
        ]);
    }

    #[Route('excel/export/role', name: 'app_excel_export_role')]
    public function exportRole(EntityManagerInterface $em)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $roles = $em->getRepository(Role::class)->findAll();
        $row = 1;
        $sheet->setCellValue("A$row","RANG");
        $sheet->setCellValue("B$row","LIBELLE");
        $row = 2;

        foreach($roles as $role){
            $rang = $role->getRang();
            $libelle = $role->getLibelle();
            
            $sheet->setCellValue("A$row",$rang);
            $sheet->setCellValue("B$row",$libelle);
            $row++;
        }
        $sheet->setTitle('Roles');
        $writer = new Xlsx($spreadsheet);
        $uniqueid = uniqid();
        $filename = "Export_Role_$uniqueid.xlsx";
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);
        return $this->file($temp_file, $filename, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
