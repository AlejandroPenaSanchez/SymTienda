<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Noticias;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/noticias/{id}", name="noticias_detalle")
     */
    public function detalle($id)
    {
        $repository = $this->getDoctrine()->getRepository(Noticias::class);

        $noticias = $repository->find($id);

        return $this->render('noticias/detalle.html.twig', [
            'noticia' => $noticias
        ]);
    }

    /**
     * @Route("/noticias_insertar", name="noticias_insertar")
     */
    public function insertar(Request $request)
    {
        $noticia = new Noticias();

        $form = $this->createFormBuilder($noticia)
            ->add('titulo', TextType::Class)
            ->add('descripcion', TextareaType::Class)
            ->add('autor', TextType::Class)
            ->add('fecha', DateTimeType::Class)
            ->add('enviar', SubmitType::Class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $noticia = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($noticia);
            $entityManager->flush();
        }

        return $this->render('noticias/insertar.html.twig', [
            'formulario' => $form->createView()
        ]);
    }

}
