
<?php
//database info for connection 2222
$user = "root";
$password = "lemnean";
$host = "localhost";
$dbase = "cinema";
$table = "movies";

//get from HTML FORM data
$title = $_POST['title'];
$genre = $_POST['genre'];
$lenght = $_POST['lenght'];
$rating = $_POST['rating'];

//
$conn = mysqli_connect($host, $user, $password, $dbase);
if (!$conn) {
    die("ERROR connect: " . mysqli_connect_error());
}

//insert into database entry from FORM HTML
$sql = "INSERT INTO $table (title, genre, lenght, rating) VALUES
        ('$title','$genre','$lenght','$rating')";
if(mysqli_query($conn, $sql)){
    echo "<p> List of movies(from database): </p>";
}else{
    echo "ERROR insert:" . mysqli_error($conn);
}

$sql1 = "SELECT * FROM $table";
$movies = $conn->query($sql1);

if($movies->num_rows > 0){
    echo "<table id='movieslist'>"; 
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Movie Title</th>";
            echo "<th>Genre</th>";
            echo "<th>Lenght(mins)</th>";
            echo "<th>Rating</th>";
        echo "</tr>";
    while($row = $movies->fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["title"]."</td>";
            echo "<td>".$row["genre"]."</td>";
            echo "<td>".$row["lenght"]."</td>";
            echo "<td>".$row["rating"]."</td>";
        echo "</tr>";
    }
} else
    echo "There's no movies in database!";

//close connection
mysqli_close($conn);
?>