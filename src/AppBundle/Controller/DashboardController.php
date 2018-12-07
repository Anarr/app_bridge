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
        $response = new Response(
            'contact',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }

    /**
     * @Route("/product/{slug}/{id}", name="product")
     */
    public function product(Request $request, $slug = '', $id = 0)
    {
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
