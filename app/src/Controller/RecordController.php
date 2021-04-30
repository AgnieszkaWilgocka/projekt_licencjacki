<?php

/**
 * RecordController
 */

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RecordController
 * @Route("/record")
 *
 */
class RecordController extends AbstractController
{
    /**
     * @param RecordRepository $recordRepository
     *
     * @return Response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="record_index",
     * )
     */
    public function index(RecordRepository $recordRepository):Response
    {
        return $this->render(
            'record/index.html.twig',
            ['data' => $recordRepository->findAll()]
        );
    }

    /**
     *
     * @param RecordRepository $recordRepository
     * @param int              $id
     *
     * @return Response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="record_show",
     *     requirements = {"id" : "[1-9]\d*"},
     * )
     */
    public function show(RecordRepository $recordRepository, int $id):Response
    {
        return $this->render(
            'record/show.html.twig',
            ['item' => $recordRepository->findById($id)]
        );
    }
}
