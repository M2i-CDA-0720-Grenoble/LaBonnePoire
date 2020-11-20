<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index(): Response
    {
        $user=$this->getUser();
        $profile=$user->getUserProfile();


        return $this->render('account/index.html.twig', [
            'user' =>$user,
            'userProfile' =>$profile,
        ]);
    }
}
