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
    echo '<input type="text"  name="image_tag" placeholder="Eminem"><br>';
    echo '<input type="text"  name="image_description" placeholder="Earth Song"><br>';
    echo '<input type="text"  name="image_title" placeholder="2:30"><br>';
    echo '<input type="submit" name="submit" value="HEAT">';
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
          echo '<span class="bold">Artist:</span><br>';
          echo $row['image_tag'] . '<br>';
          echo '<span class="bold">Song:</span><br>';
          echo $row['image_description'] . '<br>';
          echo '<span class="bold">Duration:</span><br>';
          echo $row['image_title'];
          echo '<br>';
          echo '<a href="delete.php?id=' . $row['image_id'] . '"><i class="fas fa-trash left"></i></a>';
          echo '</article>';
          echo '</div>';
      }
      echo '<button class="modaalButton addImage hvr-pulse-grow" style="font-size: 35px; font-family: sans-serif, FontAwesome">&#xF030;</button>';
      echo '<div class="modaal">';
      echo '<p class="uploadText">Upload a Song</p>';
      echo '<form action="fileUpload.php" method="post" enctype="multipart/form-data">';
      echo '<label for="fileToUpload" class="custom-file-upload">';
      echo '<i class="fa fa-cloud-upload" style="font-family: sans-serif, FontAwesome"></i> Choose picture</label><br>';
      echo '<input type="file" name="myfile" id="fileToUpload"><br>';
      echo '<input type="text"  name="image_tag" placeholder="Eminem" class="imageTag"><br>';
      echo '<input type="text"  name="image_description" placeholder="Earth Song" class="imageDesc"><br>';
      echo '<input type="text"  name="image_title" placeholder="2:30" class="imageTitle"><br>';
      echo '<input type="submit" name="submit" value="HEAT" class="imageSubmit">';
      echo '</form>';
      echo '</div>';
  }
  mysqli_close($con);
?>
