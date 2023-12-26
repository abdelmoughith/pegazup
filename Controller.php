<?php
class Controller
{
    private $db_server = "localhost:3306";
    private $db_user = "root";
    private $db_pass = "12345";
    private $db_name = "pegazup";
    private $conn;

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

        $sql = "INSERT INTO people (fname, lname, email, age, password)
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssis",
            $person->fname,
            $person->lname,
                $person->email,
                $person->age,
                $person->password
        );

        // Execute the statement
        $result = $stmt->execute();

        // Check for success
        if ($result) {
            echo "Account created successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    public function getPersonByEmail($email) {
        $sql = "SELECT * FROM people WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the data as an associative array
        $person = $result->fetch_assoc();

        // Close the statement
        $stmt->close();

        // Output the person data (you might want to return it instead)
        return $person ;
    }

    public function updatePerson($person) {
        $sql = "UPDATE people SET name = ?, age = ?, gender = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sisi", $name, $age, $gender, $id);

        // Execute the statement
        $result = $stmt->execute();

        // Check for success
        if ($result) {
            echo "Person updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
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