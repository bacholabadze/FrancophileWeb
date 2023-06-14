<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $comment = $_POST["comment"];

  // Validate and sanitize the form data as needed

  // Create an array to store the comment details
  $newComment = array(
    "fname" => $fname,
    "lname" => $lname,
    "email" => $email,
    "comment" => $comment
  );

  // Read existing comments from the file
  $fileName = "comments/comments.json";
  $comments = array();
  if (file_exists($fileName)) {
    $jsonComments = file_get_contents($fileName);
    $comments = json_decode($jsonComments, true);
  }

  // Add the new comment to the array
  $comments[] = $newComment;

  // Save the comments array to the file
  $jsonComments = json_encode($comments, JSON_PRETTY_PRINT);
  file_put_contents($fileName, $jsonComments);

  // Display the submitted comment below the form
  echo "<h3>Submitted Comment:</h3>";
  echo "<p>Name: $fname $lname</p>";
  echo "<p>Email: $email</p>";
  echo "<p>Comment: $comment</p>";
}

// Retrieve and display all submitted comments
$fileName = "comments/comments.json";
$comments = array();

// Read the comments from the file
if (file_exists($fileName)) {
  $jsonComments = file_get_contents($fileName);
  $comments = json_decode($jsonComments, true);
}

echo "<h3>All Comments:</h3>";
foreach ($comments as $comment) {
  echo "<p>Name: " . $comment["fname"] . " " . $comment["lname"] . "</p>";
  echo "<p>Email: " . $comment["email"] . "</p>";
  echo "<p>Comment: " . $comment["comment"] . "</p>";
  echo "<hr>";
}
echo "<script>window.location.href = 'contact.html';</script>";
?>
