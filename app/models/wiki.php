<?php class Wiki
{
    private $id;
    private $title;
    private $content;
    private $createdAt;

    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


    public function addWiki($imageWiki, $title, $content, $categoryId)
    {
        $this->db->query('INSERT INTO Wikis (image_wiki, title, content, category_id, author_id) VALUES (:image, :title, :content, :categoryId, :author_id)');
        $this->db->bind(':image', $imageWiki);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':categoryId', $categoryId);
        $this->db->bind(':author_id', $_SESSION['user_id']);
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function addWikiTags($wikiId, $tagId)
    {
        try {
            $query = "INSERT INTO WikiTags (wiki_id, tag_id) VALUES (:wikiId, :tagId)";
            $this->db->query($query);
            $this->db->bind(':wikiId', $wikiId);
            $this->db->bind(':tagId', $tagId);

            $this->db->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
    public function deleteWikiTags($wikiId)
    {
        $query = "DELETE FROM wikitags WHERE wiki_id = :wiki_id";
        $this->db->query($query);
        $this->db->bind(':wiki_id', $wikiId, PDO::PARAM_INT);
        $this->db->execute();
    }

    public function deleteWiki($wikiId)
    {
        $this->db->query('DELETE FROM Wikis WHERE wiki_id = :wikiId');
        $this->db->bind(':wikiId', $wikiId);
        return $this->db->execute();
    }


    public function updateWiki($wikiId, $title, $content, $categoryId, $imageWiki)
    {
        $query = "UPDATE wikis SET title = :title, content = :content, category_id = :category_id WHERE wiki_id = :wiki_id";
        $this->db->query($query);
        $this->db->bind(':title', $title, PDO::PARAM_STR);
        $this->db->bind(':content', $content, PDO::PARAM_STR);
        $this->db->bind(':category_id', $categoryId, PDO::PARAM_INT);
        $this->db->bind(':wiki_id', $wikiId, PDO::PARAM_INT);
        $this->db->execute();

        if ($imageWiki != NULL) {
            $queryImage = "UPDATE wikis SET image_wiki = :image_wiki WHERE wiki_id = :wiki_id";
            $this->db->query($queryImage);
            $this->db->bind(':image_wiki', $imageWiki, PDO::PARAM_STR);
            $this->db->bind(':wiki_id', $wikiId, PDO::PARAM_INT);

            $this->db->execute();
        }

        return true;

    }
}