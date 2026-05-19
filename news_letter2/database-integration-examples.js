// Example API Integration - Database Connection Demo
// This file shows how to integrate with different database systems

// Example 1: Fetch from RESTful API
async function loadFromAPI() {
    try {
        const response = await fetch('https://your-api.com/api/newsletter/latest', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer YOUR_TOKEN' // If authentication is required
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching from API:', error);
        return null;
    }
}

// Example 2: Node.js Backend with MySQL
/*
// backend/server.js
const express = require('express');
const mysql = require('mysql2/promise');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const pool = mysql.createPool({
    host: 'localhost',
    user: 'your_username',
    password: 'your_password',
    database: 'newsletter_db',
    waitForConnections: true,
    connectionLimit: 10
});

app.get('/api/newsletter/:id', async (req, res) => {
    try {
        const [newsletters] = await pool.query(
            'SELECT * FROM newsletters WHERE id = ?',
            [req.params.id]
        );
        
        const [coverData] = await pool.query(
            'SELECT * FROM cover_pages WHERE newsletter_id = ?',
            [req.params.id]
        );
        
        const [letterPages] = await pool.query(
            'SELECT * FROM letter_pages WHERE newsletter_id = ? ORDER BY page_order',
            [req.params.id]
        );
        
        const [highlights] = await pool.query(
            'SELECT * FROM highlights WHERE newsletter_id = ?',
            [req.params.id]
        );
        
        const response = {
            issueNumber: newsletters[0].issue_number,
            issueDate: newsletters[0].issue_date,
            coverPage: {
                headline: coverData[0].headline,
                subHeadline: coverData[0].sub_headline,
                coverImage: coverData[0].image_url,
                stories: JSON.parse(coverData[0].stories_json),
                highlights: highlights.map(h => ({
                    title: h.title,
                    description: h.description,
                    image: h.image_url
                }))
            },
            letterPages: letterPages.map(page => ({
                companyName: page.company_name,
                companyAddress: page.company_address,
                showLetterhead: page.show_letterhead,
                content: JSON.parse(page.content_json)
            })),
            pdfAttachments: JSON.parse(newsletters[0].pdf_attachments || '[]')
        };
        
        res.json(response);
    } catch (error) {
        console.error('Database error:', error);
        res.status(500).json({ error: 'Internal server error' });
    }
});

app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});
*/

// Example 3: PHP Backend with PostgreSQL
/*
<?php
// backend/api.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$dbname = 'newsletter_db';
$username = 'your_username';
$password = 'your_password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $newsletter_id = $_GET['id'] ?? 1;
    
    // Get newsletter data
    $stmt = $pdo->prepare("
        SELECT n.*, 
               c.headline, c.sub_headline, c.image_url as cover_image, c.stories_json,
               array_to_json(array_agg(h.*)) as highlights
        FROM newsletters n
        LEFT JOIN cover_pages c ON n.id = c.newsletter_id
        LEFT JOIN highlights h ON n.id = h.newsletter_id
        WHERE n.id = :id
        GROUP BY n.id, c.id
    ");
    $stmt->execute(['id' => $newsletter_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Get letter pages
    $stmt = $pdo->prepare("
        SELECT * FROM letter_pages 
        WHERE newsletter_id = :id 
        ORDER BY page_order
    ");
    $stmt->execute(['id' => $newsletter_id]);
    $pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $response = [
        'issueNumber' => $result['issue_number'],
        'issueDate' => $result['issue_date'],
        'coverPage' => [
            'headline' => $result['headline'],
            'subHeadline' => $result['sub_headline'],
            'coverImage' => $result['cover_image'],
            'stories' => json_decode($result['stories_json']),
            'highlights' => json_decode($result['highlights'])
        ],
        'letterPages' => array_map(function($page) {
            return [
                'companyName' => $page['company_name'],
                'companyAddress' => $page['company_address'],
                'showLetterhead' => $page['show_letterhead'],
                'content' => json_decode($page['content_json'])
            ];
        }, $pages),
        'pdfAttachments' => json_decode($result['pdf_attachments'] ?? '[]')
    ];
    
    echo json_encode($response);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
*/

// Example 4: Firebase Firestore Integration
async function loadFromFirestore() {
    // Note: Requires Firebase SDK to be loaded
    /*
    import { initializeApp } from 'firebase/app';
    import { getFirestore, doc, getDoc } from 'firebase/firestore';
    
    const firebaseConfig = {
        apiKey: "YOUR_API_KEY",
        authDomain: "your-app.firebaseapp.com",
        projectId: "your-project-id"
    };
    
    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);
    
    try {
        const docRef = doc(db, 'newsletters', 'latest');
        const docSnap = await getDoc(docRef);
        
        if (docSnap.exists()) {
            return docSnap.data();
        } else {
            console.log('No such document!');
            return null;
        }
    } catch (error) {
        console.error('Error loading from Firestore:', error);
        return null;
    }
    */
}

// Example 5: MongoDB Integration
/*
// backend with Node.js and MongoDB
const express = require('express');
const { MongoClient, ObjectId } = require('mongodb');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const uri = 'mongodb://localhost:27017';
const client = new MongoClient(uri);

async function connectDB() {
    await client.connect();
    return client.db('newsletter_db');
}

app.get('/api/newsletter/:id', async (req, res) => {
    try {
        const db = await connectDB();
        const newsletter = await db.collection('newsletters').findOne({
            _id: new ObjectId(req.params.id)
        });
        
        if (!newsletter) {
            return res.status(404).json({ error: 'Newsletter not found' });
        }
        
        res.json(newsletter);
    } catch (error) {
        console.error('MongoDB error:', error);
        res.status(500).json({ error: 'Internal server error' });
    }
});

app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});
*/

// Database Schema Examples

// SQL Schema for MySQL/PostgreSQL
/*
CREATE TABLE newsletters (
    id SERIAL PRIMARY KEY,
    issue_number VARCHAR(10) NOT NULL,
    issue_date DATE NOT NULL,
    pdf_attachments JSONB,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cover_pages (
    id SERIAL PRIMARY KEY,
    newsletter_id INTEGER REFERENCES newsletters(id),
    headline TEXT NOT NULL,
    sub_headline TEXT,
    image_url TEXT,
    stories_json JSONB
);

CREATE TABLE highlights (
    id SERIAL PRIMARY KEY,
    newsletter_id INTEGER REFERENCES newsletters(id),
    title VARCHAR(255),
    description TEXT,
    image_url TEXT,
    display_order INTEGER
);

CREATE TABLE letter_pages (
    id SERIAL PRIMARY KEY,
    newsletter_id INTEGER REFERENCES newsletters(id),
    page_order INTEGER NOT NULL,
    company_name VARCHAR(255),
    company_address TEXT,
    show_letterhead BOOLEAN DEFAULT true,
    content_json JSONB NOT NULL
);

-- Sample insert
INSERT INTO newsletters (issue_number, issue_date) 
VALUES ('001', '2026-05-01');

INSERT INTO cover_pages (newsletter_id, headline, sub_headline, image_url, stories_json)
VALUES (
    1,
    'Tax Reform 2026',
    'New regulations reshape accounting',
    'images/cover.jpg',
    '["Story 1", "Story 2", "Story 3"]'
);
*/

// MongoDB Schema Example
/*
{
  "_id": ObjectId("..."),
  "issueNumber": "001",
  "issueDate": ISODate("2026-05-01"),
  "coverPage": {
    "headline": "Tax Reform 2026",
    "subHeadline": "New regulations reshape accounting",
    "coverImage": "images/cover.jpg",
    "stories": ["Story 1", "Story 2", "Story 3"],
    "highlights": [
      {
        "title": "Digital Transformation",
        "description": "How AI is changing accounting",
        "image": "images/highlight1.jpg"
      }
    ]
  },
  "letterPages": [
    {
      "companyName": "Accounting Today",
      "companyAddress": "123 Finance St",
      "showLetterhead": true,
      "content": {
        "greeting": "Dear Readers,",
        "paragraphs": [...],
        "closing": "Best regards,",
        "signature": {
          "name": "John Doe",
          "title": "Editor"
        }
      }
    }
  ],
  "pdfAttachments": [],
  "createdAt": ISODate("2026-05-01T10:00:00Z")
}
*/

// To use these examples:
// 1. Choose your database system
// 2. Set up the schema
// 3. Create a backend API endpoint
// 4. Update config.dataSourceUrl in script.js to point to your API
// 5. Test the integration

module.exports = {
    loadFromAPI,
    loadFromFirestore
};
