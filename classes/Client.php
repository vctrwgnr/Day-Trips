<?php

class Client
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
    private string|null $gender;

    /**
     * @var string|null
     */
    private string|null $dateOfBirth;

    /**
     * @var string|null
     */
    private string|null $countryOfOrigin;

    /**
     * @var string|null
     */
    private string|null $email;

    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $gender
     * @param string|null $dateOfBirth
     * @param string|null $countryOfOrigin
     * @param string|null $email
     */
    public function __construct(
        int $id = null,
        string $firstName = null,
        string $lastName = null,
        string $gender = null,
        string $dateOfBirth = null,
        string $countryOfOrigin = null,
        string $email = null
    ) {
        if ($id !== null) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->gender = $gender;
            $this->dateOfBirth = $dateOfBirth;
            $this->countryOfOrigin = $countryOfOrigin;
            $this->email = $email;
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string|null
     */
    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return Client[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM clients';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Client');
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM clients WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param string $dateOfBirth
     * @param string $countryOfOrigin
     * @param string $email
     * @return Client
     */
    public function insert(
        string $firstName,
        string $lastName,
        string $gender,
        string $dateOfBirth,
        string $countryOfOrigin,
        string $email
    ): Client {
            $pdo = Db::getConnection();
            $sql = 'INSERT INTO clients VALUES(NULL,?,?,?,?,?,?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$firstName, $lastName, $gender, $dateOfBirth, $countryOfOrigin, $email]);
            $id = $pdo->lastInsertId();
            return new Client($id, $firstName, $lastName, $gender, $dateOfBirth, $countryOfOrigin, $email);
    }

    /**
     * @param int $id
     * @return Client
     */
    public function getObjectById(int $id): Client
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM clients WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject('Client');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE clients SET firstName=?, lastName=?, gender=?, dateOfBirth=?, countryOfOrigin=?, email=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->firstName, $this->lastName, $this->gender, $this->dateOfBirth, $this->countryOfOrigin, $this->email, $this->id]);
    }
}
