<?php

namespace App\Entity;

use App\Repository\HotelAmenityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelAmenityRepository::class)]
class HotelAmenity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'hotelAmenities')]
    private ?Hotel $Hotel_Id = null;

    #[ORM\ManyToOne(inversedBy: 'hotelAmenities')]
    private ?RoomAmenity $Amenity_Id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelId(): ?Hotel
    {
        return $this->Hotel_Id;
    }

    public function setHotelId(?Hotel $Hotel_Id): static
    {
        $this->Hotel_Id = $Hotel_Id;

        return $this;
    }

    public function getAmenityId(): ?RoomAmenity
    {
        return $this->Amenity_Id;
    }

    public function setAmenityId(?RoomAmenity $Amenity_Id): static
    {
        $this->Amenity_Id = $Amenity_Id;

        return $this;
    }
}
