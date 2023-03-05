<html>
  <head>
    <title>Fishing Competition 2023</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        // Get the current URL and remove the domain name
        var url = window.location.pathname.split('/').pop();
        // Get the nav links and add the 'active' class to the current link
        $('nav ul li a[href="' + url + '"]').addClass('active');
      });
    </script>
  </head>
  <body>
    <h1>Welcome to the 2023 Species Competition Page</h1>
    <hr>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="Standings.html">Standings</a></li>
        <li><a href="FishSubmissions.html">Fish Submissions</a></li>
        <li><a href="Showcase.html">Showcase</a></li>
        <li><a href= "Tips.html">Fishing Tips and Setups</a></li>
      </ul>
    </nav>
    <hr>
    <?php include 'Database.php'; ?>

    <table>
        
        <tbody>
           <?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Web';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the tables
$sql_big_game = "SELECT * FROM big_game_species";
$result_big_game = $conn->query($sql_big_game);

$sql_small_game = "SELECT * FROM small_game_species";
$result_small_game = $conn->query($sql_small_game);

// Close the database connection
$conn->close();
?>

<!-- Display the tables -->
<h1>Standings</h1>
<div class="table-container">
    <table class="big-game-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
		
            <table class="table-style">
  <?php
    if ($result_big_game->num_rows > 0) {
      echo "<tr><th>ID</th><th>Species</th></tr>";
      while($row = $result_big_game->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["species"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='2'>0 results</td></tr>";
    }
  ?>
</table>

		
        </tbody>
    </table>
    <table class="small-game-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result_small_game->num_rows > 0) {
                    while($row = $result_small_game->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["species"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>0 results</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

