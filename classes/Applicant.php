<?php

class Applicant
{
    /**
     * @var int|null
     */
    private int|null $id;

    /**
     * @var string|null
     */
    private string|null $firstName;

    /**
     * @var string|null
     */
    private string|null $lastName;

    /**
     * @var string|null
     */
    private string|null $email;



    /**
     * Constructor to initialize the properties
     */
    public function __construct(
        int    $id = null,
        string $firstName = null,
        string $lastName = null,
        string $email = null

    )
    {
        if ($id !== null) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
        }
    }


    /**
     * Get the applicant ID
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the first name
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Get the last name
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Get the email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }


    /**
     * Get all applicants as objects
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM applicants';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $applicants = $stmt->fetchAll(PDO::FETCH_CLASS, 'Applicant');
        return $applicants;
    }

    /**
     * Delete an applicant by ID
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM applicants WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * Insert a new applicant
     */
    public function insert(
        string $firstName,
        string $lastName,
        string $email
    ): Applicant
    {

        $pdo = Db::getConnection();
        $sql = 'INSERT INTO applicants VALUES (NULL,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email]);
        $id = $pdo->lastInsertId();
        return new Applicant($id, $firstName, $lastName, $email);

    }

    /**
     * Get an applicant object by ID
     */
    public function getObjectById(int $id): Applicant
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM applicants WHERE id=?'; // updated table name
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject('Applicant');
    }

    /**
     * Update the applicant's data in the database
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE applicants SET firstName=?, lastName=?, email=?  WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->firstName, $this->lastName, $this->email, $this->id]);
    }
}
