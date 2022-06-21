<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\AgencyRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CheckHealthController
 */
class CheckHealthController extends AbstractController
{
    /**
     * Permet au cluster kubernetes de connaître l'etat de l'application.
     *
     * @Route("/check/ready", name="check_ready", methods={"GET"})
     */
    public function checkReadyAction()
    {
        return new Response('Ready', Response::HTTP_OK);
    }

    /**
     * Permet au cluster kubernetes de connaître l'état de l'application.
     *
     * @Route("/check/health", name="check_healthy", methods={"GET"})
     */
    public function checkHealthAction()
    {
        return new Response('Healthy', Response::HTTP_OK);
    }

    /**
     * @Route("/check/up", name="check_up", methods={"GET"})
     */
    public function checkUpAction(AgencyRepository $agencyRepository)
    {
        try {
            $agencyRepository->findOneByName('Paris');

            return new Response('Up', Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }
}
