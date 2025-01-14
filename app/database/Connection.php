<?php

namespace App\Database;

use Dotenv;

require __DIR__ . '/../../vendor/autoload.php';

// Adjust the path if your .env file is in the project root
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// using oop php

class Connection
{
    public $conn;
    public function __construct()
    {
        $host = $_ENV['SERVERNAME'];
        $dbname = $_ENV['DATABASE'];
        $user = $_ENV['USERNAME'];
        $pass = $_ENV['PASSWORD'];

        $this->conn = new \mysqli($host, $user, $pass, $dbname);

        if (!$dbname || !$user || !$pass || !$host) {
            echo "Database connection failed";
        }
    }
    public function connect()
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
