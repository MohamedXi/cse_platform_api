<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{

    /**
     * @Route(name="profile", path="/profile")
     * @return RedirectResponse
     */
    public function getProfileAction(): RedirectResponse
    {
        return $this->redirectToRoute('api_users_get_collection', ['username' => $this->getUser()->getUsername()]);
    }
}
