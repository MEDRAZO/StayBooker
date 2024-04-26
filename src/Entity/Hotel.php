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

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Location = null;

    #[ORM\Column]
    private ?float $Rating = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $ContactInformation = null;

    #[ORM\Column(length: 150)]
    private ?string $Website = null;

    #[ORM\Column]
    private ?int $StarCategory = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $CheckIn_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $CheckOut_date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Photos = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Policies = null;

    /**
     * @var Collection<int, HotelAmenity>
     */
    #[ORM\OneToMany(targetEntity: HotelAmenity::class, mappedBy: 'Hotel_Id')]
    private Collection $hotelAmenities;

    /**
     * @var Collection<int, Room>
     */
    #[ORM\OneToMany(targetEntity: Room::class, mappedBy: 'Hotel_Id', orphanRemoval: true)]
    private Collection $hotelRooms;

    public function __construct()
    {
        $this->hotelAmenities = new ArrayCollection();
        $this->hotelRooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): static
    {
        $this->Location = $Location;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->Rating;
    }

    public function setRating(float $Rating): static
    {
        $this->Rating = $Rating;

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

    public function getContactInformation(): ?string
    {
        return $this->ContactInformation;
    }

    public function setContactInformation(string $ContactInformation): static
    {
        $this->ContactInformation = $ContactInformation;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->Website;
    }

    public function setWebsite(string $Website): static
    {
        $this->Website = $Website;

        return $this;
    }

    public function getStarCategory(): ?int
    {
        return $this->StarCategory;
    }

    public function setStarCategory(int $StarCategory): static
    {
        $this->StarCategory = $StarCategory;

        return $this;
    }

    public function getCheckInDate(): ?\DateTimeInterface
    {
        return $this->CheckIn_date;
    }

    public function setCheckInDate(\DateTimeInterface $CheckIn_date): static
    {
        $this->CheckIn_date = $CheckIn_date;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->CheckOut_date;
    }

    public function setCheckOutDate(\DateTimeInterface $CheckOut_date): static
    {
        $this->CheckOut_date = $CheckOut_date;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->Photos;
    }

    public function setPhotos(string $Photos): static
    {
        $this->Photos = $Photos;

        return $this;
    }

    public function getPolicies(): ?string
    {
        return $this->Policies;
    }

    public function setPolicies(string $Policies): static
    {
        $this->Policies = $Policies;

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
            $hotelAmenity->setHotelId($this);
        }

        return $this;
    }

    public function removeHotelAmenity(HotelAmenity $hotelAmenity): static
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
    public function getHotelRooms(): Collection
    {
        return $this->hotelRooms;
    }

    public function addHotelRoom(Room $hotelRoom): static
    {
        if (!$this->hotelRooms->contains($hotelRoom)) {
            $this->hotelRooms->add($hotelRoom);
            $hotelRoom->setHotelId($this);
        }

        return $this;
    }

    public function removeHotelRoom(Room $hotelRoom): static
    {
        if ($this->hotelRooms->removeElement($hotelRoom)) {
            // set the owning side to null (unless already changed)
            if ($hotelRoom->getHotelId() === $this) {
                $hotelRoom->setHotelId(null);
            }
        }

        return $this;
    }
}
