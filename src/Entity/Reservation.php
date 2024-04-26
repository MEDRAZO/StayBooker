<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $ChekInTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $CheckOutDate = null;

    #[ORM\Column]
    private ?float $TotalPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $PaymentStatus = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $SpecialRequests = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $PromotionalCode = null;

    #[ORM\Column]
    private ?int $NumberOfGuests = null;


    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Room $Room_Id = null;

    #[ORM\ManyToOne(inversedBy: 'userReservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User_Id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChekInTime(): ?\DateTimeInterface
    {
        return $this->ChekInTime;
    }

    public function setChekInTime(\DateTimeInterface $ChekInTime): static
    {
        $this->ChekInTime = $ChekInTime;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->CheckOutDate;
    }

    public function setCheckOutDate(\DateTimeInterface $CheckOutDate): static
    {
        $this->CheckOutDate = $CheckOutDate;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->TotalPrice;
    }

    public function setTotalPrice(float $TotalPrice): static
    {
        $this->TotalPrice = $TotalPrice;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->PaymentStatus;
    }

    public function setPaymentStatus(string $PaymentStatus): static
    {
        $this->PaymentStatus = $PaymentStatus;

        return $this;
    }

    public function getSpecialRequests(): ?string
    {
        return $this->SpecialRequests;
    }

    public function setSpecialRequests(?string $SpecialRequests): static
    {
        $this->SpecialRequests = $SpecialRequests;

        return $this;
    }

    public function getPromotionalCode(): ?string
    {
        return $this->PromotionalCode;
    }

    public function setPromotionalCode(?string $PromotionalCode): static
    {
        $this->PromotionalCode = $PromotionalCode;

        return $this;
    }

    public function getNumberOfGuests(): ?int
    {
        return $this->NumberOfGuests;
    }

    public function setNumberOfGuests(int $NumberOfGuests): static
    {
        $this->NumberOfGuests = $NumberOfGuests;

        return $this;
    }

    
    public function getRoomId(): ?Room
    {
        return $this->Room_Id;
    }

    public function setRoomId(?Room $Room_Id): static
    {
        $this->Room_Id = $Room_Id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->User_Id;
    }

    public function setUserId(?User $User_Id): static
    {
        $this->User_Id = $User_Id;

        return $this;
    }
}
