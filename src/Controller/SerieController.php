<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeriesRepository;
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
    public function list(SeriesRepository $serieRepository ): Response
    {
        $series = $serieRepository->findBy([],['popularity'=>'DESC']);
//dd($series);
        return $this->render('serie/list.html.twig', [
            "series"=>$series
        ]);
    }
    /**
     * @Route("/series/details/{id}", name="details")
     */
    public function details( int $id , SeriesRepository $seriesRepository): Response
    {
           $serie=$seriesRepository->find($id);
        return $this->render('serie/details.html.twig',[
            "serie"=>$serie

        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request): Response
    {

        return $this->render('serie/create.html.twig');
    }
    /**
     * @Route("/demo" , name="em-demo")
     */
    public function demo(EntityManagerInterface $entityManager):Response{
        // creer une nouvelle instance de mon entité
        $serie= new Series();


        // hydrate toutes les proprietés
        $serie->setName('luc');
        $serie->setBackdrop('starwars');
        $serie->setPoster('starwars');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 1 year"));
        $serie->setLastAirDate(new \DateTime("- 6 month"));
        $serie->setGenres('drama');
        $serie->setOverview('bla bla bla ');
        $serie->setPopularity('123.00');
        $serie->setVote('8');
        $serie->setStatus('top');
        $serie->setTmdbId('3.1');

        dump($serie);

        $entityManager->persist($serie);
        $entityManager->flush();

        return $this->render('serie/create.html.twig');
    }
}
