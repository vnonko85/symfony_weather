<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ApiWeatherService
{
    /**
     * @var GuzzleHttp\ClientInterface $client
     */
    private $client;

    /**
     * @const KELVIN_CONST
     */
    private const KELVIN_CONST = 273.15;

    /**
     * @param ClientInterface $client
     * @return void
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $cityName
     * @return array
     */
    public function getWeather(string $cityName)
    {
        $weatherInfo = $this->client->get('/data/2.5/forecast', [
            'query' => array_merge([
                'q' => $cityName,
            ], $this->client->getConfig('query')),
        ]);

        $responseData = json_decode($weatherInfo->getBody());
        $datesWeather = [];
        foreach ($responseData->list as $dayItem) {
            $datesWeather[] = [
                'date' => $dayItem->dt,
                'temp' => $this->kelvinToCelsius($dayItem->main->temp),
                'humidity' => $dayItem->main->humidity,
                'pressure' => $dayItem->main->pressure,
            ];
        }

        return $datesWeather;
    }

    /**
     * @param float $temp
     * @return float
     */
    private function kelvinToCelsius(float $temp): float
    {
        return $temp - static::KELVIN_CONST;
    }
}
