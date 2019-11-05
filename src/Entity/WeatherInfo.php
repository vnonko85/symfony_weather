<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeatherInfoRepository")
 */
class WeatherInfo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @JMS\Exclude()
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @JMS\Exclude()
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @JMS\Accessor(getter="getTempFormatted")
     */
    private $temp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $humidity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pressure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="weatherInfo")
     * @ORM\JoinColumn(nullable=false)
     * @JMS\Exclude()
     */
    private $city;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @JMS\VirtualProperty()
     */
    public function getDateFormatted(): string
    {
        return gmdate("Y-m-d H:i:s", $this->date);
    }

    public function getTempFormatted(): string
    {
        return round($this->temp, 1);
    }

    public function setDate(?int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTemp(): ?float
    {
        return $this->temp;
    }

    public function setTemp(?float $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(?int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getPressure(): ?int
    {
        return $this->pressure;
    }

    public function setPressure(?int $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }
}
