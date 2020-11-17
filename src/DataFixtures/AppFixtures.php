<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\User;
use App\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
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
