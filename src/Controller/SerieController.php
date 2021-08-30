<?php

namespace App\Controller;

use App\Entity\Series;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/demo" , name="em-demo")
     */
    public function demo(EntityManagerInterface $entityManager):Response{
        // creer une nouvelle instance de mon entité
        $serie= new Series();


        // hydrate toutes les proprietés
        $serie->setString('luc');
        $serie->setBackdrop('starwars');
        $serie->setPoster('starwars');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 1 year"));
        $serie->setFirstAirDate(new \DateTime("- 6 month"));
        $serie->setGenres('drama');
        $serie->setOverview('bla bla bla ');
        $serie->setPopularity('123.00');
        $serie->setVote('8.2');

        dump($serie);
        $entityManager->persist($serie);
        $entityManager->flush();

        return $this->render('serie/create.html.twig');
    }
}
