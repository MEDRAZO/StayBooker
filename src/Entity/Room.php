<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $RoomNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $RoomType = null;

    #[ORM\Column]
    private ?int $Capacity = null;

    #[ORM\Column]
    private ?float $PricePerNight = null;

    #[ORM\Column]
    private ?bool $Availability = null;

    #[ORM\Column(length: 255)]
    private ?string $RoomSize = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Photos = null;

    #[ORM\Column(length: 150)]
    private ?string $BedType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SmokingPreference = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'Room_Id', orphanRemoval: true)]
    private Collection $Roomreservations;

    #[ORM\ManyToOne(inversedBy: 'hotelRooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $Hotel_Id = null;

    public function __construct()
    {
        $this->Roomreservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNumber(): ?string
    {
        return $this->RoomNumber;
    }

    public function setRoomNumber(string $RoomNumber): static
    {
        $this->RoomNumber = $RoomNumber;

        return $this;
    }

    public function getRoomType(): ?string
    {
        return $this->RoomType;
    }

    public function setRoomType(string $RoomType): static
    {
        $this->RoomType = $RoomType;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->Capacity;
    }

    public function setCapacity(int $Capacity): static
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getPricePerNight(): ?float
    {
        return $this->PricePerNight;
    }

    public function setPricePerNight(float $PricePerNight): static
    {
        $this->PricePerNight = $PricePerNight;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->Availability;
    }

    public function setAvailability(bool $Availability): static
    {
        $this->Availability = $Availability;

        return $this;
    }

    public function getRoomSize(): ?string
    {
        return $this->RoomSize;
    }

    public function setRoomSize(string $RoomSize): static
    {
        $this->RoomSize = $RoomSize;

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

    public function getBedType(): ?string
    {
        return $this->BedType;
    }

    public function setBedType(string $BedType): static
    {
        $this->BedType = $BedType;

        return $this;
    }

    public function getSmokingPreference(): ?string
    {
        return $this->SmokingPreference;
    }

    public function setSmokingPreference(?string $SmokingPreference): static
    {
        $this->SmokingPreference = $SmokingPreference;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->Roomreservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->Roomreservations->contains($reservation)) {
            $this->Roomreservations->add($reservation);
            $reservation->setRoomId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->Roomreservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoomId() === $this) {
                $reservation->setRoomId(null);
            }
        }

        return $this;
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
}
