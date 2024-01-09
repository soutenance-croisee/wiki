CREATE TABLE categories (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

CREATE TABLE tags (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE wikis (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_archived BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (author_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
USE wiki;

ALTER TABLE wikis
ADD CONSTRAINT fk_category
FOREIGN KEY (category_id) REFERENCES categories(id)
ON DELETE CASCADE;
ALTER TABLE wiki_tag_pivot
ADD CONSTRAINT fk_wiki_tag_pivot_tag_id
FOREIGN KEY (tag_id)
REFERENCES tags(id)
ON DELETE CASCADE;
CREATE TABLE tag_wiki_pivot (
    tag_id INT,
    wiki_id INT,
    PRIMARY KEY (tag_id, wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (wiki_id) REFERENCES wikis(id) ON DELETE CASCADE ON UPDATE CASCADE
);