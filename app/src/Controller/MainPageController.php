<?php

/**
 * MainPageController Controller.
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainPageController
 *
 *
 *
 */
class MainPageController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route(
     *     "/main_page",
     *      name="main_page"
     * )
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "/career",
     *     name="career"
     * )
     */
    public function career(): Response
    {
        return $this->render('main/career.html.twig');
    }


    /**
     * @return Response
     *
     * @Route(
     *     "/curiosities",
     *     name="curiosities"
     *     )
     */
    public function curiosities(): Response
    {
        return $this->render('main/curiosities.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "/duet",
     *     name="duet"
     * )
     */
    public function duet():Response
    {
        return $this->render('main/duet.html.twig');
    }

    /**
     * @return Response
     *
     *
     * @Route(
     *     "/competitions",
     *     name="competitions"
     *     )
     */
    public function competitions():Response
    {
        return $this->render('main/competitions.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "/competitions/Mexico1968",
     *     name="competition_Mexico"
     * )
     */
    public function c_Mexico():Response
    {
        return $this->render('main/c_Mexico.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "/competitions/Budapest1996",
     *     name="competition_Budapest"
     * )
     */
    public function c_Budapest():Response
    {
        return $this->render('main/c_Budapest.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "competitions/Roma1974",
     *     name="competition_Roma"
     * )
     */
    public function c_Roma():Response
    {
        return $this->render('main/c_Roma.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "competitions/Montreal1977",
     *     name="competition_Montreal"
     * )
     */
    public function c_Montreal():Response
    {
        return $this->render('main/c_Montreal.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "competitions/c_WorldCup",
     *     name="competition_WorldCup"
     * )
     */
    public function c_WorldCup():Response
    {
        return $this->render('main/c_WorldCup.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "competitions/c_Monachium",
     *     name="competition_Monachium"
     * )
     */
    public function c_Monachium():Response
    {
        return $this->render('main/c_Monachium.html.twig');
    }

    /**
     * @return Response
     *
     * @Route(
     *     "about",
     *     name="about"
     * )
     */
    public function about():Response
    {
        return $this->render('main/about.html.twig');
    }
}
