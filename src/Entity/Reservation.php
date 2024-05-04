<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $check_in_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $check_out_date = null;

    #[ORM\Column]
    private ?float $total_price = null;

    #[ORM\Column(length: 100)]
    private ?string $payment_status = null;

    #[ORM\Column(length: 50)]
    private ?string $promotional_code = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $customerId = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Room $roomId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckInDate(): ?\DateTimeImmutable
    {
        return $this->check_in_date;
    }

    public function setCheckInDate(\DateTimeImmutable $check_in_date): static
    {
        $this->check_in_date = $check_in_date;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeImmutable
    {
        return $this->check_out_date;
    }

    public function setCheckOutDate(\DateTimeImmutable $check_out_date): static
    {
        $this->check_out_date = $check_out_date;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(string $payment_status): static
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    public function getPromotionalCode(): ?string
    {
        return $this->promotional_code;
    }

    public function setPromotionalCode(string $promotional_code): static
    {
        $this->promotional_code = $promotional_code;

        return $this;
    }

    public function getCustomerId(): ?User
    {
        return $this->customerId;
    }

    public function setCustomerId(?User $customerId): static
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getRoomId(): ?Room
    {
        return $this->roomId;
    }

    public function setRoomId(?Room $roomId): static
    {
        $this->roomId = $roomId;

        return $this;
    }
}
