<?php class Category
{
    private $db;
    private $id;
    private $title;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function fetchCategoriesNumber()
    {
        try {
            $this->db->query("SELECT count(*) as categories_number from categories");
            $row = $this->db->fetch();
            return $row;
        } catch (\Exception $e) {
            error_log("Error in fetchCategoriesNumber(): " . $e->getMessage());
        }
    }

    public function insertCategory($title)
    {
        $this->db->query("INSERT INTO categories (title) VALUES (:title)");
        $this->db->bind(":title", $title);
        $this->db->execute();
    }
    public function updateCategory($title, $id)
    {
        try {
            $this->db->query("UPDATE categories SET title = :title WHERE id = :id");
            $this->db->bind(":title", $title);
            $this->db->bind(":id", $id);
            $this->db->execute();
        } catch (\Exception $e) {
            error_log("Error in updateCategory: " . $e->getMessage());
        }
    }

}