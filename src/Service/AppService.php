<?php

namespace App\Service;

use App\Entity\City;
use App\Entity\WeatherInfo;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;

class AppService
{
    /**
     * @var ApiWeatherService
     */
    private $apiService;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param ApiWeatherService $apiService
     * @param EntityManagerInterface $em
     * @param SerializerInterface $serializer
     * @return void
     */
    public function __construct(
        ApiWeatherService $apiService,
        EntityManagerInterface $em,
        SerializerInterface $serializer)
    {
        $this->apiService = $apiService;
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @param string $cityName
     * @return string
     */
    public function getWeatherInfo(string $cityName): string
    {
        $repository = $this->em->getRepository(City::class);

        $city = $repository->findOneBy([
            'name' => $cityName,
        ]);

        if (!$city) {
            $city = new City();
            $city->setName($cityName);
            $this->em->persist($city);
        }
        
        if (!count($city->getWeatherInfo())) {
            $this->setCityWeather($city);
        }

        $this->em->flush();

        return $this->serializer->serialize($city->getWeatherInfo(), 'json');
    }

    /**
     * @param City $city
     */
    private function setCityWeather(City $city): void
    {
        $weatherInfo = $this->apiService->getWeather($city->getName());
        foreach ($weatherInfo as $dateItem) {
            $weatherInfo = new WeatherInfo();
            $weatherInfo->setDate($dateItem['date']);
            $weatherInfo->setTemp($dateItem['temp']);
            $weatherInfo->setHumidity($dateItem['humidity']);
            $weatherInfo->setPressure($dateItem['pressure']);
            $city->addWeatherInfo($weatherInfo);

            $this->em->persist($weatherInfo);
        }
    } 
}
