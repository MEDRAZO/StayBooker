<?php

namespace App\Entity;

use App\Repository\RoomAmenitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomAmenitiesRepository::class)]
class RoomAmenities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $amenity_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, HotelAmenities>
     */
    #[ORM\OneToMany(targetEntity: HotelAmenities::class, mappedBy: 'amenityId', orphanRemoval: true)]
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
        return $this->amenity_name;
    }

    public function setAmenityName(string $amenity_name): static
    {
        $this->amenity_name = $amenity_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, HotelAmenities>
     */
    public function getHotelAmenities(): Collection
    {
        return $this->hotelAmenities;
    }

    public function addHotelAmenity(HotelAmenities $hotelAmenity): static
    {
        if (!$this->hotelAmenities->contains($hotelAmenity)) {
            $this->hotelAmenities->add($hotelAmenity);
            $hotelAmenity->setAmenityId($this);
        }

        return $this;
    }

    public function removeHotelAmenity(HotelAmenities $hotelAmenity): static
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
