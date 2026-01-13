<?php
include 'db_connect.php';
$result = mysqli_query($conn, "SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Projects | Student Portal</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="gallery-bg">
  <header>
    <nav>
      <div class="logo">🎓 Student Portal</div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="submit.html">Submit Project</a></li>
        <li><a href="projects.php" class="active">Projects</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="gallery-section">
    <h2>Submitted Projects</h2>
    <div class="project-cards">
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="card">
          <h3><?= $row['title'] ?></h3>
          <p><strong>Student:</strong> <?= $row['name'] ?></p>
          <p><strong>Domain:</strong> <?= $row['domain'] ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
</body>
</html>
