<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WeatherInfo", mappedBy="city", orphanRemoval=true)
     */
    private $weatherInfo;

    public function __construct()
    {
        $this->weatherInfo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|WeatherInfo[]
     */
    public function getWeatherInfo(): Collection
    {
        $format = 'Y-m-d H:i:s';
        $dt = \DateTimeImmutable::createFromFormat($format, date($format), new \DateTimeZone('UTC'));

        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->gt('date', $dt->format('U')));

        return $this->weatherInfo->matching($criteria);
    }

    public function addWeatherInfo(WeatherInfo $weatherInfo): self
    {
        if (!$this->weatherInfo->contains($weatherInfo)) {
            $this->weatherInfo[] = $weatherInfo;
            $weatherInfo->setCity($this);
        }

        return $this;
    }

    public function removeWeatherInfo(WeatherInfo $weatherInfo): self
    {
        if ($this->weatherInfo->contains($weatherInfo)) {
            $this->weatherInfo->removeElement($weatherInfo);
            // set the owning side to null (unless already changed)
            if ($weatherInfo->getCity() === $this) {
                $weatherInfo->setCity(null);
            }
        }

        return $this;
    }
}
