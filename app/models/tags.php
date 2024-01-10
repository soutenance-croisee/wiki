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
                          JOIN tags_wiki_pivot twp ON t.id = twp.tag_id
                          WHERE twp.wiki_id = :wiki_id");
        $this->db->bind(':wiki_id', $wikiId);

        $tags = $this->db->fetchAll();

        if ($tags) {
            // $tag = new Tag();
            $this->setId($tags['id']);
            $this->setTitle($tags['tag_name']);

            return $tags;
        }
    }

    // Add a new tag for a specific wiki
    public function addNewTag($wikiId, $tagName)
    {
        // Check if the tag already exists
        $this->db->query("SELECT * FROM tags WHERE tag_name = :tag_name");
        $this->db->bind(':tag_name', $tagName);
        $tag = $this->db->fetch();

        // If the tag doesn't exist, add it
        if (!$tag) {
            $this->db->query('INSERT INTO tags (tag_name) VALUES (:tag_name)');
            $this->db->bind(':tag_name', $tagName);
            $this->db->execute();
            $this->setId($this->db->lastInsertId());
        } else {
            $this->setId($tag['id']);
        }

        // Add the tag to the pivot table
        $this->db->query('INSERT INTO tags_wiki_pivot (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)');
        $this->db->bind(':wiki_id', $wikiId);
        $this->db->bind(':tag_id', $this->getId());

        return $this->db->execute();
    }
}