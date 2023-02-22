<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Role;

class PdfController extends AbstractController
{
    #[Route('/pdf', name: 'app_pdf_role')]
    public function exportPdfRoles(EntityManagerInterface $em){
        $roles=$em->getRepository(Role::class)->findAll();
        $html=$this->renderView("role/exportPdfRoles.html.twig",['roles'=>$roles]);
        $html2pdf=new Html2Pdf('L','A4','fr');
        $fichier='Export_Role.pdf';
        $html2pdf->writeHTML($html);
        $html2pdf->output($fichier,'D');

    }
}
