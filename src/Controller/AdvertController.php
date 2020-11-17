<?php

namespace App\Controller;

use App\Entity\Advert;
use App\Repository\AdvertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController {
  /**
   * @Route("/", name="advert")
   */
  public function index(AdvertRepository $repo) {

    return $this->render('default/index.html.twig',
  [
    'adverts'=> $repo->findAll()
  ]);
  }
  
  /**
   * @Route("/{id}", name="showAdvert")
   */
  public function show(Advert $advert) {
    
   //    $advert = $this->getDoctrine()->getRepository(Advert::class)->find($id);
      return $this->render('default/show.html.twig',['advert'=>$advert] );
  
  }
}

