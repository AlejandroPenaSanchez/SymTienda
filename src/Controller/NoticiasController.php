<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Noticias;

class NoticiasController extends Controller
{
    /**
     * @Route("/noticias", name="noticias")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Noticias::class);

        $noticias = $repository->findAll();
        $ultima = time();

        //pintar vista
        return $this->render('noticias/index.html.twig', [
            'controller_name' => 'NoticiasController',
            'titulo' => 'Noticias',
            'fecha' => date('d/m/y'),
            'ultimaVisita' => $ultima,
            'noticias' => $noticias

        ]);
    }
}
