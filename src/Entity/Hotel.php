<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $location = null;

    #[ORM\Column]
    private ?int $rating = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $contact_us = [];

    #[ORM\Column(length: 100)]
    private ?string $website = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $photos = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $policies = null;

    /**
     * @var Collection<int, HotelAmenities>
     */
    #[ORM\OneToMany(targetEntity: HotelAmenities::class, mappedBy: 'hotelId', orphanRemoval: true)]
    private Collection $hotelAmenities;

    /**
     * @var Collection<int, Room>
     */
    #[ORM\OneToMany(targetEntity: Room::class, mappedBy: 'hotelId', orphanRemoval: true)]
    private Collection $rooms;

    public function __construct()
    {
        $this->hotelAmenities = new ArrayCollection();
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

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

    public function getContactUs(): array
    {
        return $this->contact_us;
    }

    public function setContactUs(array $contact_us): static
    {
        $this->contact_us = $contact_us;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getPolicies(): ?string
    {
        return $this->policies;
    }

    public function setPolicies(string $policies): static
    {
        $this->policies = $policies;

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
            $hotelAmenity->setHotelId($this);
        }

        return $this;
    }

    public function removeHotelAmenity(HotelAmenities $hotelAmenity): static
    {
        if ($this->hotelAmenities->removeElement($hotelAmenity)) {
            // set the owning side to null (unless already changed)
            if ($hotelAmenity->getHotelId() === $this) {
                $hotelAmenity->setHotelId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): static
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setHotelId($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): static
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHotelId() === $this) {
                $room->setHotelId(null);
            }
        }

        return $this;
    }
}
