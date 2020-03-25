<?php
  include "dbVars.php";
  $con   = mysqli_connect("localhost", "root", "", "heatbeatz");
  $sql   = "SELECT * FROM images ORDER BY RAND()";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 0){
    echo "<p>Er zijn nog geen foto's geupload naar FlushBox</p>";
    echo '<button class="modaalButton addImage hvr-pulse-grow" style="font-size: 35px; font-family: sans-serif, FontAwesome">&#xF030;</button>';
    echo '<div class="modaal">';
    echo '<form action="fileUpload.php" method="post" enctype="multipart/form-data">';
    echo '<label for="fileToUpload" class="custom-file-upload">';
    echo '<i class="fa fa-cloud-upload" style="font-family: sans-serif, FontAwesome"></i> Choose picture</label>';
    echo '<input type="file" name="myfile" id="fileToUpload"><br>';
    echo '<input type="text"  name="image_title" placeholder="Title"><br>';
    echo '<input type="text"  name="image_description" placeholder="Description"><br>';
    echo '<input type="text"  name="image_tag" placeholder="Tag"><br>';
    echo '<input type="submit" name="submit" value="Flush">';
    echo '</form>';
    echo '</div>';
  } else {
      while ($row = mysqli_fetch_array($result)) {
          echo '<div class="card">';
          echo '<img src="uploads/' . $row['image_url'] . '" alt="' . $row['image_url'] . '" class="modaalButton">';
          echo '</div>';
          echo '<div class="album modaal">';
          echo '<img src="uploads/' . $row['image_url'] . '" alt="' . $row['image_url'] . '">';
          echo '<article>';
          echo '<span class="bold">Title:</span><br>';
          echo $row['image_title'] . '<br>';
          echo '<span class="bold">Description:</span><br>';
          echo $row['image_description'] . '<br>';
          echo '<span class="bold">Tag:</span><br>';
          echo $row['image_tag'];
          echo '</article>';
          echo '</div>';
      }
      echo '<button class="modaalButton addImage hvr-pulse-grow" style="font-size: 35px; font-family: sans-serif, FontAwesome">&#xF030;</button>';
      echo '<div class="modaal">';
      echo '<p class="uploadText">Upload a photo</p>';
      echo '<form action="fileUpload.php" method="post" enctype="multipart/form-data">';
      echo '<label for="fileToUpload" class="custom-file-upload">';
      echo '<i class="fa fa-cloud-upload" style="font-family: sans-serif, FontAwesome"></i> Choose picture</label><br>';
      echo '<input type="file" name="myfile" id="fileToUpload"><br>';
      echo '<input type="text"  name="image_title" placeholder="Title" class="imageTitle"><br>';
      echo '<input type="text"  name="image_description" placeholder="Description" class="imageDesc"><br>';
      echo '<input type="text"  name="image_tag" placeholder="Tag" class="imageTag"><br>';
      echo '<input type="submit" name="submit" value="Flush" class="imageSubmit">';
      echo '</form>';
      echo '</div>';
  }
  mysqli_close($con);
?>
