<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_")
 */

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="list")
     */
    public function list(): Response
    {
        return $this->render('serie/list.html.twig', [
        ]);
    }
    /**
     * @Route("/series/details/{id}", name="details")
     */
    public function details( int $id): Response
    {

        return $this->render('serie/details.html.twig');
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request): Response
    {
        dd($request);
        return $this->render('serie/create.html.twig');
    }

}
