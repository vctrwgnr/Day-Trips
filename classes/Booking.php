<?php

class Booking
{
    private int $id;
    private int $upcomingTripId;
    private ?string $applicantId;

    private UpcomingTrip $upcomingTrip;
    private Applicant $applicant;

    public function __construct(?int $id = null, ?int $upcomingTripId = null, ?int $applicantId = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->upcomingTripId = $upcomingTripId;
            $this->applicantId = $applicantId;
            $this->upcomingTrip = (new UpcomingTrip())->getObjectById($upcomingTripId);
            $this->applicant = (new Applicant())->getObjectById($applicantId);
        }
    }

    public function setUpcomingTripObject(): void
    {
        $this->upcomingTrip = (new UpcomingTrip())->getObjectById($this->upcomingTripId);
    }

    public function setApplicantObject(): void
    {
        $this->applicant = (new Applicant())->getObjectById($this->applicantId);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUpcomingTripId(): int
    {
        return $this->upcomingTripId;
    }

    public function getApplicantId(): ?string
    {
        return $this->applicantId;
    }

    public function getUpcomingTrip(): UpcomingTrip
    {
        return $this->upcomingTrip;
    }

    public function getApplicant(): Applicant
    {
        return $this->applicant;
    }

    public function getObjectById(int $id): Booking
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM bookings WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $b = $stmt->fetchObject('Booking');
        return $b;
//        $u = $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $tripId, $tripDate, $availablePlaces){ return new UpcomingTrip($id, $tripId, $tripDate, $availablePlaces);
//        return $u[0];

    }

    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM bookings';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $bookings = $stmt->fetchAll(PDO::FETCH_CLASS, 'Booking');
        return $bookings;
//        return $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $tripId, $tripDate, $availablePlaces){ return new UpcomingTrip($id, $tripId, $tripDate, $availablePlaces); ;});
    }

    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM bookings WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(int $upcomingTripId, int $applicantId): Booking
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO bookings VALUES(NULL,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$upcomingTripId, $applicantId]);
        $id = $pdo->lastInsertId();
        return new Booking($id, $upcomingTripId, $applicantId);
    }

    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE bookings SET upcomingTripId=?, applicantId=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->upcomingTrip, $this->applicantId, $this->id]);
    }


}
