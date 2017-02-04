<?php
$files = glob('../../temp/{,.}*', GLOB_BRACE);// get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
unlink('/home/vishnukcs123/temp/aa.php'); // delete file

unlink('/home/vishnukcs123/temp/aa.php'); 
?>

