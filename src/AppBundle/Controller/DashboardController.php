<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function about(Request $request)
    {
        $data = array(
            'title' => "I'm about page"
        );
        return $this->render('default/dashboard/about.html.twig', $data);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {
        // $response = new Response(
        //     'contact',
        //     Response::HTTP_OK,
        //     array('content-type' => 'text/html')
        // );

        // return $response;
        $data = array(
            'title' => "I'm Contact page"
        );
        return $this->render('default/pages/contact.html.twig', $data);

    }

    /**
     * @Route("/product/{slug}/{id}", name="product")
     */
    public function product(Request $request, $slug = '', $id = 0)
    {
        $data = array(
            'title' => "I'm Product page"
        );
        return $this->render('default/pages/product.html.twig', $data);

        $slug = trim($slug);
        if (!empty($slug) && empty($id)) {
            $content = "Show category";
        } elseif(!empty($slug) && !empty($id)) {
            $content = "Show category product with $id id";
        }
        
        $response = new Response(
            $content,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/products", name="products")
     */
    public function products(Request $request, $slug = '', $id = 0)
    {
        $data = array(
            'title' => "I'm Products page"
        );
        return $this->render('default/pages/products.html.twig', $data);

        $slug = trim($slug);
        if (!empty($slug) && empty($id)) {
            $content = "Show category";
        } elseif(!empty($slug) && !empty($id)) {
            $content = "Show category product with $id id";
        }
        
        $response = new Response(
            $content,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/companies", name="companies")
     */
    public function companies(Request $request)
    {
        $response = new Response(
            'companies',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/service", name="service")
     */
    public function service(Request $request)
    {
        $response = new Response(
            'services',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/vision", name="vision")
     */
    public function vision(Request $request)
    {
        $response = new Response(
            'vision',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/mission", name="mission")
     */
    public function mission(Request $request)
    {
        $response = new Response(
            'mission',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }
}
