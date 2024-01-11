<?php class Wiki
{
    private $id;
    private $title;
    private $body;
    private $author_id;
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
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getAuthor_Id()
    {
        return $this->author_id;
    }
    public function setAuthor_Id($author_id)
    {
        $this->author_id = $author_id;
    }
    public function getbody()
    {
        return $this->body;
    }
    public function setbody($body)
    {
        $this->body = $body;
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
    public function getAllWikis($category_id)
    {
        $this->db->query('SELECT Wikis.*, Users.name, Categories.title, GROUP_CONCAT(Tags.title) AS tag_names
    FROM Wikis
    JOIN Users ON Wikis.author_id = Users.id
    JOIN Categories ON Wikis.category_id = Categories.id
    LEFT JOIN tag_wiki_pivot ON Wikis.id = tag_wiki_pivot.wiki_id
    LEFT JOIN Tags ON tag_wiki_pivot.tag_id = Tags.id
    WHERE Wikis.is_archived = 0 AND Categories.id = :category_id
    GROUP BY Wikis.id
    ORDER BY Wikis.updated_at DESC');

        $this->db->bind(':category_id', $category_id);

        return $this->db->fetchAll();
    }

    public function addWiki($title, $content, $categoryId, $img, $body)
    {
        $this->db->query('INSERT INTO Wikis (title, content, author_id, category_id, image_wiki, body) VALUES (:title, :content, :author_id, :categoryId, :img, :body)');
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':author_id', $_SESSION['user_id']);
        $this->db->bind(':categoryId', $categoryId);
        $this->db->bind(':img', $img);
        $this->db->bind(':body', $body);

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
    public function fetchTagsByWiki($wikiId)
    {
        $this->db->query("SELECT t.* FROM tags t
        JOIN tag_wiki_pivot twp ON t.id = twp.tag_id
        WHERE twp.wiki_id = :wiki_id");
        $this->db->bind(':wiki_id', $wikiId);

        $tagsData = $this->db->fetchAll();
        // var_dump($tagsData)
        ;
        return $tagsData;
        // $tagObjects = [];

        // foreach ($tagsData as $tagData) {
        //     $tag = new Tag();
        //     $tag->setId($tagData['id']);
        //     $tag->setTitle($tagData['title']);
        //     $tagObjects[] = $tag;
        // }

        // return $tagObjects;
    }
    public function getMyWikis()
    {
        $this->db->query('SELECT Wikis.*, Users.name, Users.email, Categories.title, GROUP_CONCAT(Tags.title) AS tag_names
            FROM Wikis
            JOIN Users ON Wikis.author_id = Users.id
            JOIN Categories ON Wikis.category_id = Categories.id
            LEFT JOIN tag_wiki_pivot ON Wikis.id = tag_wiki_pivot.wiki_id
            LEFT JOIN Tags ON tag_wiki_pivot.tag_id = Tags.id
            WHERE Wikis.is_archived = 0 AND author_id = :user_id
            GROUP BY Wikis.id
            ORDER BY Wikis.updated_at DESC
        ');

        $this->db->bind(':user_id', $_SESSION['user_id']);

        return $this->db->fetchAll();
    }
    public function getWikisGroupedByCategory()
    {
        $this->db->query('SELECT Categories.title AS category_title, GROUP_CONCAT(Wikis.title) AS wiki_titles
                          FROM Wikis
                          JOIN Categories ON Wikis.category_id = Categories.id
                          WHERE Wikis.is_archived = 0
                          GROUP BY Categories.id
                          ORDER BY Categories.id');

        return $this->db->fetchAll();
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
        $this->db->query('DELETE FROM Wikis WHERE id = :wikiId');
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


    public function fetchWiki($id)
    {
        $this->db->query("SELECT * FROM wikis WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        $result = $this->db->fetch();

        if ($result) {
            $this->setId($result['id']);
            $this->setTitle($result['title']);
            $this->setContent($result['content']);
            $this->setbody($result['body']);
            $this->setAuthor_Id($result['author_id']);
            $this->setCreatedAt($result['created_at']);
        }
    }
    public function searchWiki($searchTerm)
    {
        $this->db->query('
            SELECT * FROM Wikis
            WHERE title LIKE :searchTerm
        ');
        $this->db->bind(':searchTerm', "%$searchTerm%");

        return $this->db->FetchAll();
    }

    public function searchTag($searchTerm)
    {
        $this->db->query('
            SELECT * FROM Tags
            WHERE title LIKE :searchTerm
        ');
        $this->db->bind(':searchTerm', "%$searchTerm%");

        return $this->db->fetchAll();
    }

    public function searchCategory($searchTerm)
    {
        $this->db->query('
            SELECT * FROM Categories
            WHERE title LIKE :searchTerm
        ');
        $this->db->bind(':searchTerm', "%$searchTerm%");

        return $this->db->fetchAll();
    }
}