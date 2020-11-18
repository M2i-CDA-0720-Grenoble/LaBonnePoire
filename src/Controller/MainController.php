<?php

namespace App\Controller;

use App\Repository\AdvertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MainController extends AbstractController {
  /**
   * @Route("/", name="homepage")
   */
  public function index(AdvertRepository $advertRepo) {
    $adverts = $advertRepo->findBy(array(), ['updatedAt'=>'desc'], 3);
    //$firstImage = [];
    foreach($adverts as $advert){
      if(!empty($advert->getAdvertPhotos()[0])){
        $firstImage = $advert->getAdvertPhotos()[0];
      }
    }

    return $this->render('default/index.html.twig', [
      'adverts' => $adverts,
      'image' => $firstImage
    ]);
  }
}