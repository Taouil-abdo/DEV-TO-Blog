DROP DATABASE IF EXISTS devToblog_db;
CREATE DATABASE devToblog_db;

-- Connect to the database
USE devToblog_db;


-- Create users table first
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture VARCHAR(255),
    role ENUM('admin', 'author', 'user') NOT NULL DEFAULT 'user'
) ;

-- Create categories table
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    categorie_name TEXT NOT NULL
) ;

-- Create tags table
CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255) NOT NULL UNIQUE
) ;

-- Create articles table with proper foreign keys
CREATE TABLE articles (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    excerpt TEXT,
    meta_description VARCHAR(160),
    featured_image VARCHAR(255),
    status ENUM('draft', 'published', 'scheduled') NOT NULL DEFAULT 'draft',
    scheduled_date DATETIME NULL,
    category_id BIGINT NOT NULL,
    author_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    views INTEGER DEFAULT 0,
    UNIQUE KEY idx_articles_slug (slug),
    KEY idx_articles_category (category_id),
    KEY idx_articles_author (author_id),
    KEY idx_articles_status_date (status, scheduled_date),
    CONSTRAINT fk_articles_category FOREIGN KEY (category_id) 
        REFERENCES categories (id) ON DELETE CASCADE,
    CONSTRAINT fk_articles_author FOREIGN KEY (author_id) 
        REFERENCES users (id) ON DELETE CASCADE ON UPDATE 
) ;

-- Create article_tags table
CREATE TABLE article_tags (
    article_id BIGINT UNSIGNED,
    tag_id BIGINT,
    PRIMARY KEY (article_id, tag_id),
    CONSTRAINT fk_article_tags_article FOREIGN KEY (article_id) 
        REFERENCES articles (id) ON DELETE CASCADE,
    CONSTRAINT fk_article_tags_tag FOREIGN KEY (tag_id) 
        REFERENCES tags (id) ON DELETE CASCADE
) ;



-- Insert data into users table
INSERT INTO users (username, email, password_hash, bio, profile_picture, role) VALUES
('john_doe', 'john.doe@example.com', 'hashedpassword1', 'Software developer with a passion for open-source projects.', 'john_doe.jpg', 'admin'),
('jane_smith', 'jane.smith@example.com', 'hashedpassword2', 'Freelance writer specializing in technology and health.', 'jane_smith.jpg', 'author'),
('alice_jones', 'alice.jones@example.com', 'hashedpassword3', 'Data scientist focusing on machine learning and AI.', 'alice_jones.jpg', 'user'),
('bob_brown', 'bob.brown@example.com', 'hashedpassword4', 'Educator with a background in science and mathematics.', 'bob_brown.jpg', 'user'),
('charlie_green', 'charlie.green@example.com', 'hashedpassword5', 'Film critic and movie enthusiast.', 'charlie_green.jpg', 'user');

-- Insert data into categories table
INSERT INTO categories (categorie_name) VALUES
('Technology'),
('Health & Wellness'),
('Science'),
('Education'),
('Entertainment');

-- Insert data into tags table
INSERT INTO tags (tag_name) VALUES
('Artificial Intelligence'),
('Machine Learning'),
('Health Tips'),
('Educational Tips'),
('Movie Reviews');

-- Insert data into articles table
INSERT INTO articles (title, slug, content, excerpt, meta_description, featured_image, status, scheduled_date, category_id, author_id) VALUES
('The Future of AI in Healthcare', 'future-ai-healthcare', 'Artificial Intelligence is revolutionizing the healthcare industry...', 'AI is transforming healthcare with innovative solutions.', 'AI healthcare innovations', 'ai_healthcare.jpg', 'published', NULL, 1, 1),
('Top Health Tips for a Better Lifestyle', 'top-health-tips', 'Maintaining a healthy lifestyle involves a balanced diet and regular exercise...', 'Improve your lifestyle with these health tips.', 'Healthy lifestyle tips', 'health_tips.jpg', 'draft', NULL, 2, 2),
('Understanding Machine Learning Algorithms', 'understanding-ml-algorithms', 'Machine Learning algorithms are the backbone of modern AI systems...', 'Learn about the fundamentals of machine learning algorithms.', 'Machine Learning algorithms explained', 'ml_algorithms.jpg', 'scheduled', '2024-12-30 10:00:00', 3, 3),
('The Importance of STEM Education', 'importance-stem-education', 'STEM education is crucial for the development of future innovators...', 'Why STEM education matters for the future.', 'STEM education importance', 'stem_education.jpg', 'published', NULL, 4, 4),
('Best Movies of 2023: A Critic\'s Review', 'best-movies-2023', '2023 has been a fantastic year for cinema with several standout films...', 'A review of the best movies of 2023.', 'Best movies of 2023 review', 'best_movies_2023.jpg', 'draft', NULL, 5, 5);

-- Insert data into article_tags table
INSERT INTO article_tags (article_id, tag_id) VALUES
(1, 1), -- The Future of AI in Healthcare -> Artificial Intelligence
(1, 2), -- The Future of AI in Healthcare -> Machine Learning
(2, 3), -- Top Health Tips for a Better Lifestyle -> Health Tips
(3, 2), -- Understanding Machine Learning Algorithms -> Machine Learning
(4, 4), -- The Importance of STEM Education -> Educational Tips
(5, 5); -- Best Movies of 2023: A Critic's Review -> Movie Reviews

