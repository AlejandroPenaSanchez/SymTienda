<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductosController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function Index()
    {
        return $this->render('productos/index.html.twig', [
            'controller_name' => 'Titulo de ProductosController',
        ]);
    }

    /**
     * @Route("/producto", name="producto")
     */
    public function Producto()
    {
        return $this->render('productos/producto.html.twig', [
            'controller_name' => 'quiero mostrar un producto',
        ]);
    }

    /**
     * @Route("/producto/{id}", name="productoID")
     */
    public function GetProductoWhitId($id)
    {
        return $this->render('productos/producto.html.twig', [
            'controller_name' => 'quiero mostrar un unico producto con id'.$id,
        ]);
    }
}
