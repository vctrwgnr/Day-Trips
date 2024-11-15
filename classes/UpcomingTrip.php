<?php

class UpcomingTrip
{
    private int $id;
    private int $tripId;
    private ?string $tripDate;
    private ?int $availablePlaces;

    /**
     * @var ?Trip
     */
    private Trip $trip;

    /**
     * @param int|null $id
     * @param int|null $tripId
     * @param string|null $tripDate
     * @param int|null $availablePlaces
     */
    public function __construct(?int $id = null, ?int $tripId = null, ?string $tripDate = null, ?int $availablePlaces = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->tripId = $tripId;
            $this->tripDate = $tripDate;
            $this->availablePlaces = $availablePlaces;
            $this->trip = (new Trip())->getObjectById($this->tripId);
        }
    }

    public function setTripObject(): void
    {
        $this->trip = (new Trip())->getObjectById($this->tripId);
    }



    public function getTripDestination() : string
    {
        return (new Trip())->getObjectById($this->tripId)->getDestination();
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getTripId(): int
    {
        return $this->tripId;
    }

    public function getTripDate(): string
    {
        return $this->tripDate;
    }

    public function getAvailablePlaces(): ?int
    {
        return $this->availablePlaces;
    }

    /**
     * @return Trip
     */
    public function getTrip(): Trip
    {
        return $this->trip;
    }

    /**
     * @param int $id
     * @return UpcomingTrip
     */
    public function getObjectById(int $id): UpcomingTrip
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM upcomingTrips WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
//        $u = $stmt->fetchObject('UpcomingTrip');
//        return $u;
        $u = $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $tripId, $tripDate, $availablePlaces){ return new UpcomingTrip($id, $tripId, $tripDate, $availablePlaces);});
        return $u[0];

    }

    /**
     * @return UpcomingTrip[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM upcomingTrips';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
//        $upcomingTrips = $stmt->fetchAll(PDO::FETCH_CLASS, 'UpcomingTrip');
//        return $upcomingTrips;
        return $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $tripId, $tripDate, $availablePlaces){ return new UpcomingTrip($id, $tripId, $tripDate, $availablePlaces);});
    }

    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM upcomingTrips WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(int $tripId, string $tripDate, int $availablePlaces): UpcomingTrip
    {
            $pdo = Db::getConnection();
            $sql = 'INSERT INTO upcomingTrips VALUES(NULL,?,?,?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$tripId, $tripDate, $availablePlaces]);
            $id = $pdo->lastInsertId();
            return new UpcomingTrip($id, $tripId, $tripDate, $availablePlaces);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE upcomingTrips SET tripId=?, tripDate=?, availablePlaces=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->tripId, $this->tripDate, $this->availablePlaces, $this->id]);
    }

    public function getPossibleDestinations()
    {
        if(isset($this->id)){
            return (new Trip())->getDropDownMenuDestination($this);
        } else {
            return (new Trip())->getDropDownMenuDestination();
        }
    }

}
