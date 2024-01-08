<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE Email = :email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount())
            return true;
        else
            return false;
    }
    public function register($name, $email, $password)
    {
        $this->db->query('INSERT INTO users(name,email,Password) VALUES (:name,:email,:password)');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->execute();
        // if ($this->db->execute())
        //     return true;
        // else
        //     return false;
    }
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        // var_dump($row);

        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }

    }

    public function fetchUsers()
    {
        try {
            $this->db->query("SELECT * FROM users where role='author' or role='admin'");
            $row = $this->db->fetchAll();

            return $row;
        } catch (\Exception $e) {

            error_log("Error fetching users: " . $e->getMessage());
            return [];
        }
    }


}