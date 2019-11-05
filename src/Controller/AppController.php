<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CityType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\AppService;
use App\Entity\City;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home", methods="GET")
     */
    public function index(): Response
    {
        $form = $this->createForm(CityType::class, null, [
            'action' => $this->generateUrl('city_weather'),
        ]);

        return $this->render('app/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="city_weather", methods="POST")
     */
    public function weather(Request $request, AppService $service): Response
    {
        $city = new City();
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $city = $form->getData();
            $weatherData = $service->getWeatherInfo($city->getName());
        } else {
            $weatherData = json_encode([
                'error' => 'Wrong parameters.'
            ]);
        }

        $response = new Response();
        $response->setContent($weatherData);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
