<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Producto;

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


    /**
     * @Route("/producto/{name, price, units}", name="setProducto")
     */
    public function SetProducto($Name, $price, $units)
    {
        $producto = new Producto();
        $producto->setNombre('Impresora');
        $producto->setPrecio(120.5);
        $producto->setUnidades(7);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($producto);// guardar en cache
        $entityManager->flush();//guardar la cache en la db

        return $this->render('productos/producto.html.twig', [
            'controller_name' => 'quiero mostrar un unico producto con id'.$id,
        ]);
    }
}
