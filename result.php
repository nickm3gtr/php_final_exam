<?php

$errorMsg = '';
$gridSize = 20;

if (!empty($_POST['words']) || strlen($_POST['words']) > 0) {
  $words = $_POST['words'];

  $splitWords = preg_split("/[\s,]+/", $words);

  $splitCharacters = array();

  for ($i = 0; $i < sizeof($splitWords); $i++) {
    $splitCharacters[$i] = str_split(strtoupper($splitWords[$i]));
  }

  $grid = array();


  // loop to each word and assign a random row and col as starting point
  for ($i = 0; $i < sizeof($splitCharacters); $i++) {
    $randomRow = rand(0, $gridSize - sizeof($splitCharacters[$i]));
    $randomCol = rand(0, $gridSize - sizeof($splitCharacters[$i]));

    // Check if not empty to avoid conflicting words
    while (!empty($grid[$randomRow][$randomCol])) {
      $randomRow = rand(0, $gridSize - sizeof($splitCharacters[$i]));
      $randomCol = rand(0, $gridSize - sizeof($splitCharacters[$i]));
    }

    for ($j = 0; $j < sizeof($splitCharacters[$i]); $j++) {
      $grid[$randomRow][$randomCol] = $splitCharacters[$i][$j];
      $randomRow++;
      $randomCol++;
    }
  }
} else {
  $errorMsg = 'Please input valid text in the textarea';
}

// populate empty index
$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
for ($i = 0; $i < $gridSize; $i++) {
  for ($j = 0; $j < $gridSize; $j++) {
    if (empty($grid[$i][$j])) {
      $randomLetter = rand(0, sizeof($letters) - 1);
      $grid[$i][$j] = $letters[$randomLetter];
      // $grid[$i][$j] =
    }
  }
}

?>

<?php include 'layouts/header.php'; ?>

<?php
if (strlen($errorMsg) > 0) {
  print '<div class="alert alert-danger" role="alert">';
  print $errorMsg;
  print '</div>';
}
?>
<a class="btn btn-primary mb-3" href="index.php" role="button">
  <span class="material-icons">home</span>
</a>
<button class="btn btn-primary mb-3 ml-2" id="replay-btn">
  <span class="material-icons">replay</span>
</button>

<table class="table table-bordered">

  <?php
  for ($i = 0; $i < $gridSize; $i++) {
    print '<tr>';
    for ($j = 0; $j < $gridSize; $j++) {
      print '<td>' . $grid[$i][$j] . '</td>';
    }
    print '</tr>';
  }
  ?>
</table>

<?php include 'layouts/footer.php'; ?>