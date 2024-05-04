<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $room_number = null;

    #[ORM\Column(length: 100)]
    private ?string $room_type = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $avalibility = null;

    #[ORM\Column(length: 100)]
    private ?string $room_size = null;

    #[ORM\Column(length: 100)]
    private ?string $view = null;

    #[ORM\Column(length: 100)]
    private ?string $bed_type = null;

    #[ORM\Column]
    private ?bool $smoking_preference = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotelId = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'roomId', orphanRemoval: true)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNumber(): ?int
    {
        return $this->room_number;
    }

    public function setRoomNumber(int $room_number): static
    {
        $this->room_number = $room_number;

        return $this;
    }

    public function getRoomType(): ?string
    {
        return $this->room_type;
    }

    public function setRoomType(string $room_type): static
    {
        $this->room_type = $room_type;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isAvalibility(): ?bool
    {
        return $this->avalibility;
    }

    public function setAvalibility(bool $avalibility): static
    {
        $this->avalibility = $avalibility;

        return $this;
    }

    public function getRoomSize(): ?string
    {
        return $this->room_size;
    }

    public function setRoomSize(string $room_size): static
    {
        $this->room_size = $room_size;

        return $this;
    }

    public function getView(): ?string
    {
        return $this->view;
    }

    public function setView(string $view): static
    {
        $this->view = $view;

        return $this;
    }

    public function getBedType(): ?string
    {
        return $this->bed_type;
    }

    public function setBedType(string $bed_type): static
    {
        $this->bed_type = $bed_type;

        return $this;
    }

    public function isSmokingPreference(): ?bool
    {
        return $this->smoking_preference;
    }

    public function setSmokingPreference(bool $smoking_preference): static
    {
        $this->smoking_preference = $smoking_preference;

        return $this;
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

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setRoomId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoomId() === $this) {
                $reservation->setRoomId(null);
            }
        }

        return $this;
    }
}
