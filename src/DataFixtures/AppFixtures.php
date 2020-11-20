<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\User;
use App\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

         public function __construct(UserPasswordEncoderInterface $passwordEncoder)
         {
             $this->passwordEncoder = $passwordEncoder;
         }
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('admin@free.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
            
        ));
        $manager->persist($user);

        // Generate cities
        $citiesUrl = file_get_contents("https://geo.api.gouv.fr/departements/38/communes?fields=nom&format=json&geometry=centre");
        $citiesJson = json_decode($citiesUrl);
        foreach($citiesJson as $obj){
            $city = new City();
            $city->setName($obj->nom);
            $manager->persist($city);
        }

        $manager->flush();
    }
}
