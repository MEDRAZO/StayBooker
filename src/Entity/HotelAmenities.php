<?php

namespace App\Entity;

use App\Repository\HotelAmenitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelAmenitiesRepository::class)]
class HotelAmenities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'hotelAmenities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotelId = null;

    #[ORM\ManyToOne(inversedBy: 'hotelAmenities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RoomAmenities $amenityId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelId(): ?Hotel
    {
        return $this->hotelId;
    }

    public function setHotelId(?Hotel $hotelId): static
    {
        $this->hotelId = $hotelId;

        return $this;
    }

    public function getAmenityId(): ?RoomAmenities
    {
        return $this->amenityId;
    }

    public function setAmenityId(?RoomAmenities $amenityId): static
    {
        $this->amenityId = $amenityId;

        return $this;
    }
}
