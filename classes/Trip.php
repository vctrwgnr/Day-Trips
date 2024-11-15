<?php
class Trip
{
    private int|null $id;
    private string|null $destination;
    private string|null $description;

    public function __construct(?int $id = null, ?string $destination = null, ?string $description = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->destination = $destination;
            $this->description = $description;
        }
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM trips';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $trips = $stmt->fetchAll(PDO::FETCH_CLASS, 'Trip');
        return $trips;
    }

    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM trips WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(string $destination,
                           string $description): Trip
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO trips VALUES(NULL,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$destination, $description]);
        $id = $pdo->lastInsertId();
        return new Trip($id, $destination, $description);
    }

    public function getObjectById(int $id): Trip
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM trips WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $t = $stmt->fetchObject('Trip');
        return $t;
    }

    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE trips SET destination=?, description=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->destination, $this->description, $this->id]);
    }

    public function setDestination(string $destination): void {
        $this->destination = $destination;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDropDownMenuDestination($upcomingTrip = null): string
    {
        $trips = $this->getAllAsObjects();
        $html = '<select name="tripId" class="form-select">';
        foreach ($trips as $t) {
            $selected = '';
            if (isset($upcomingTrip)) {
                $selected = ($t->getId() === $upcomingTrip->getTripId()) ? ' selected' : '';
            }
            $html .= '<option value="' . $t->getId() . '"' . $selected . '>' . $t->getDestination() . '</option>';
        }
        $html .= '</select>';

        return $html;
    }

}
