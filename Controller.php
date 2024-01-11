<?php
class Controller
{
    private $db_server = "localhost:3306";
    private $db_user = "root";
    private $db_pass = "12345";
    private $db_name = "pegazup";
    private $conn;


    public function getConn()
    {
        return $this->conn;
    }


    public function __construct() {
        // Create a connection
        $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->db_name);

        // Check the connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //CREATE
    public function createperson($person) {
        //$person = new Person();
        $fname = $person->getFname();
        $lname = $person->getLname();
        $email = $person->getEmail();
        $age = $person->getAge();
        $password = $person->getPassword();

        $sql = "INSERT INTO people(fname, lname, email, age, password)
        VALUES ('$fname', '$lname', '$email', '$age', '$password')";

        mysqli_query($this->conn, $sql);
    }

    public function getPersonByEmail($email) {
        require_once "Person.php";
        $sql = "SELECT * FROM people WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);//exe
        if (mysqli_num_rows($result)){//ligne
            $row = mysqli_fetch_assoc($result);//data
            $person = new Person(
                $row['fname'],
                $row['lname'],
                $row['email'],
                $row['age'],
                $row['password'],
                $row['inscription']
            );
            $person->setId($row['id']);
            return $person;
        }
        return null;
    }

    public function updatePersonByEmail($email, $person) {
        $sql = "UPDATE people SET name = ?, age = ?, gender = ? WHERE email = ?";
    }
    public function updatePersonInscriptionByEmail($email, $inscription) {
        $sql = "UPDATE people SET inscription = '$inscription' WHERE email = '$email'";
        mysqli_query($this->conn, $sql);
    }

    public function deletePerson($id) {
        $sql = "DELETE FROM persons WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute the statement
        $result = $stmt->execute();

        // Check for success
        if ($result) {
            echo "Person deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    public function __destruct() {
        // Close the database connection when the object is destroyed
        if ($this->conn) {
            $this->conn->close();
        }
    }

/*
    // Example usage
    $controller = new PersonController("your_host", "your_username", "your_password", "your_database");

    // Create a new person
    $controller->createPerson("John Doe", 25, "Male");

    // Get a person by ID
    $controller->getPersonById(1);

    // Update a person
    $controller->updatePerson(1, "Jane Doe", 28, "Female");

    // Delete a person
    $controller->deletePerson(1);
*/
}