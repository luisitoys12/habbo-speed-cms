<form method="POST" enctype="multipart/form-data">
  <input type="file" name="slide">
  <button type="submit">Subir imagen</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $target = '../../assets/images/slides/' . basename($_FILES['slide']['name']);
  move_uploaded_file($_FILES['slide']['tmp_name'], $target);
  echo "✅ Slide subida";
}
?>
