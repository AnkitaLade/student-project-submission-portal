<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Submit Project | Student Portal</title>
<link rel="stylesheet" href="css/style.css">
<style>
  #successMsg {
    margin-top: 15px;
    color: green;
    font-weight: bold;
  }
</style>
</head>
<body class="form-bg">
<header>
  <nav>
    <div class="logo">🎓 Student Portal</div>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="submit.php" class="active">Submit Project</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>
</header>

<section class="form-section">
<h2>Submit Your Project</h2>

<!-- Form submission to PHP -->
<form id="projectForm" method="POST" action="submit_project.php" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Student Name" required>
  <input type="text" name="roll" placeholder="Roll Number" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="title" placeholder="Project Title" required>

  <input list="domainOptions" name="domain" placeholder="Project Domain" required>
  <datalist id="domainOptions">
    <option value="Web Development">
    <option value="Mobile App">
    <option value="Machine Learning">
    <option value="Artificial Intelligence">
    <option value="Data Science">
    <option value="Cyber Security">
    <option value="Cloud Computing">
    <option value="IoT">
    <option value="Blockchain">
  </datalist>

  <textarea name="abstract" placeholder="Write a short abstract (4-5 lines)" rows="5" required></textarea>
  <textarea name="description" placeholder="Project Description" rows="6" required></textarea>
  <input type="file" name="file" accept=".pdf,.zip" required>

  <button type="submit">Submit Project</button>
</form>

<p id="successMsg"></p>
</section>

<script>
const form = document.getElementById('projectForm');
const successMsg = document.getElementById('successMsg');

form.addEventListener('submit', function(e){
  e.preventDefault();
  const formData = new FormData(form);

  fetch('submit_project.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if(data.trim() === 'success'){
      successMsg.innerText = 'Project submitted successfully!';
      form.reset();
      setTimeout(() => { window.location.href = 'projects.php'; }, 2000);
    } else {
      successMsg.innerText = 'Error: ' + data;
    }
  })
  .catch(err => successMsg.innerText = 'Error: ' + err);
});
</script>
</body>
</html>
