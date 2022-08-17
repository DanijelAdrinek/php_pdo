<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'devtest';

// Set DSN

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

//  Create a PDO instance
$pdo = new PDO($dsn, $user, $password);

# PRDO QUERY

$stmt = $pdo->query('SELECT * FROM posts');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['id'] . '<br>';
}

// PDO query
$author = 'brad';

$sql = 'SELECT * FROM posts WHERE author = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$author]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($posts);

foreach($posts as $post) {
    echo $post["title"] . "<br>";
}