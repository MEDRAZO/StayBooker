<?php

namespace App\Entity;

use App\Repository\RoomAmenityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomAmenityRepository::class)]
class RoomAmenity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $AmenityName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    /**
     * @var Collection<int, HotelAmenity>
     */
    #[ORM\OneToMany(targetEntity: HotelAmenity::class, mappedBy: 'Amenity_Id')]
    private Collection $hotelAmenities;

    public function __construct()
    {
        $this->hotelAmenities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmenityName(): ?string
    {
        return $this->AmenityName;
    }

    public function setAmenityName(string $AmenityName): static
    {
        $this->AmenityName = $AmenityName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, HotelAmenity>
     */
    public function getHotelAmenities(): Collection
    {
        return $this->hotelAmenities;
    }

    public function addHotelAmenity(HotelAmenity $hotelAmenity): static
    {
        if (!$this->hotelAmenities->contains($hotelAmenity)) {
            $this->hotelAmenities->add($hotelAmenity);
            $hotelAmenity->setAmenityId($this);
        }

        return $this;
    }

    public function removeHotelAmenity(HotelAmenity $hotelAmenity): static
    {
        if ($this->hotelAmenities->removeElement($hotelAmenity)) {
            // set the owning side to null (unless already changed)
            if ($hotelAmenity->getAmenityId() === $this) {
                $hotelAmenity->setAmenityId(null);
            }
        }

        return $this;
    }
}
