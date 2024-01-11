<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function fetchWikis()
    {
        try {
            $query = "
                SELECT * from wikis WHERE is_archived=0
            ";

            $this->db->query($query);

            $results = $this->db->fetchAll();
            // var_dump($results);
            return $results;

        } catch (Exception $e) {
            error_log("Error fetching wikis by category: " . $e->getMessage());
            return [];
        }
    }



    public function archiveWiki($id)
    {

        try {
            $this->db->query("UPDATE wikis SET is_archived = 1 WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->execute();
            $results = $this->db->fetchAll();
            return $results;
        } catch (Exception $e) {
            error_log("Error fetching wikis by category: " . $e->getMessage());
            return [];
        }

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
        try {
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->fetch();
            // var_dump($row);

            if ($row) {
                $hashed_password = $row['password'];
                if (password_verify($password, $hashed_password)) {
                    // var_dump($password);
                    return $row; // Authentication successful
                } else {
                    return false; // Incorrect password
                }
            } else {
                return false; // Email not found
            }
        } catch (PDOException $e) {
            // Handle database errors
            error_log('Login error: ' . $e->getMessage());
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
    public function fetchUsersNumber()
    {
        try {
            $this->db->query("SELECT count(*) as users_number from users");
            $row = $this->db->fetch();
            return $row;
        } catch (\Exception $e) {
            error_log("Error in fetchUsersNumber(): " . $e->getMessage());
        }
    }
    public function fetchTagsNumber()
    {
        try {
            $this->db->query("SELECT count(*) as tags_number from tags");
            $row = $this->db->fetch();
            return $row;
        } catch (\Exception $e) {
            error_log("Error in fetchUsersNumber(): " . $e->getMessage());
        }
    }
    public function fetchWikisNumber()
    {
        try {
            $this->db->query("SELECT count(*) as wikis_number from wikis");
            $row = $this->db->fetch();
            return $row;
        } catch (\Exception $e) {
            error_log("Error in fetchUsersNumber(): " . $e->getMessage());
        }

    }

    public function fetchCategoriesNumber()
    {
        try {
            $this->db->query("SELECT count(*) as categories_number from categories");
            $row = $this->db->fetch();
            return $row;
        } catch (\Exception $e) {
            error_log("Error in fetchUsersNumber(): " . $e->getMessage());
        }
    }

    public function fetchCategories()
    {
        try {
            $this->db->query("SELECT * FROM categories");
            $row = $this->db->fetchAll();

            return $row;
        } catch (Exception $e) {

            error_log("Error fetching users: " . $e->getMessage());
            return [];
        }
    }


    public function fetchTags()
    {
        try {
            $this->db->query("SELECT * 
                      FROM tags");
            $rows = $this->db->fetchAll();
            // var_dump($rows);
            return $rows;
        } catch (Exception $e) {
            error_log("Error fetching tags: " . $e->getMessage());
            return [];
        }
    }
    public function deleteCategory($id)
    {

        $this->db->query("DELETE from categories where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
    public function deleteTag($id)
    {

        $this->db->query("DELETE from tags where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
    public function insertCategory($title)
    {

        $this->db->query("INSERT into categories(title) values(:title)");
        $this->db->bind(":title", $title);
        $this->db->execute();

    }

}