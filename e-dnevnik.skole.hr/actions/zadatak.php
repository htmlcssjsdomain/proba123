<?php
$target_dir ="../uploads/";
$target_files = $target_dir .basename($_FILES['zadatak']['name']);
$uploadOk =1;
$imageFileType =strtolower(pathinfo($target_files, PATHINFO_EXTENSION));

if($_FILES['zadatak'] ['size'] > 100000) {
    echo "Veličina datoteke nije dozvoljena,";
    $uploadOk =0;
}

if($uploadOk ==0) {
    echo "zadatak je nije upješno predan!";
} else {
    if(move_uploaded_file($_FILES['zadatak'] ['tmp_name'], $target_files)) {
        echo "Zadatak je uspješno predan.";
    } else {
        echo "Dogodila se greška prilikom predaje zadatka, pokušaj ponovno!";
    }
}