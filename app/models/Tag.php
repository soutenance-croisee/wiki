<?php
class Tag
{
    private $db;
    private $id;
    private $title;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Fetch tags for a specific wiki
    public function fetchTagsByWiki($wikiId)
    {
        $this->db->query("SELECT t.* FROM tags t
        JOIN tag_wiki_pivot twp ON t.id = twp.tag_id
        WHERE twp.wiki_id = :wiki_id");
        $this->db->bind(':wiki_id', $wikiId);

        $tags = $this->db->fetchAll();
        return $tags;

    }


    // Add a new tag for a specific wiki
    public function addNewTag($wikiId, $tagName)
    {
        // Insert the tag
        $this->db->query('INSERT INTO tags (title) VALUES (:tag_name)');
        $this->db->bind(':tag_name', $tagName);
        $this->db->execute();

        // Get the last inserted tag ID
        $tagId = $this->db->lastInsertId();

        // Add the tag to the pivot table
        $this->db->query('INSERT INTO tag_wiki_pivot (tag_id, wiki_id) VALUES (:tag_id, :wiki_id)');
        $this->db->bind(':wiki_id', $wikiId);
        $this->db->bind(':tag_id', $tagId);

        return $this->db->execute();
    }

}