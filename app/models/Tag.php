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
        // var_dump($tagsData);

        // $data = [];

        // foreach ($tagsData as $tagData) {
        //     $tag = new Tag();
        //     $tag->setId($tagData['id']);
        //     $tag->setTitle($tagData['title']);
        //     $data[] = $tag;
        // }

        // return $data;
    }


    // Add a new tag for a specific wiki
    public function addNewTag($wikiId, $tagName)
    {
        // Check if the tag already exists
        $this->db->query("SELECT * FROM tags WHERE title= :tag_name");
        $this->db->bind(':tag_name', $tagName);
        $tag = $this->db->fetch();

        // If the tag doesn't exist, add it
        if (!$tag) {
            $this->db->query('INSERT INTO tags (title) VALUES (:tag_name)');
            $this->db->bind(':tag_name', $tagName);
            $this->db->execute();
            $this->setId($this->db->lastInsertId());
        } else {
            $this->setId($tag['id']);
        }

        // Add the tag to the pivot table
        $this->db->query('INSERT INTO tags_wiki_pivot ( tag_id,wiki_id) VALUES ( :tag_id,:wiki_id)');
        $this->db->bind(':wiki_id', $wikiId);
        $this->db->bind(':tag_id', $this->getId());

        return $this->db->execute();
    }
}