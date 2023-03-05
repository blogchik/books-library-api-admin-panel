<?php

include "../../check2.php";

if($_POST != null){

    if($_SESSION['page-id'] == null){

        header("Location: ../pages");

    }

    $page_id = $_SESSION['page-id'];
    $book = $_POST['book'];
    $page_num = $_POST['page_num'];
    
    $conn->query("UPDATE pages SET book_id = '$book', page_num = '$page_num' WHERE id = '$page_id'");

    if($_FILES['page_photo_arabic']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["page_photo_arabic"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_photo_arabic"]["tmp_name"], "../../photos/page_photo_arabic-$page_id." . $imageFileType);
        
        $ver = upd_ver();

        $photo_url = "https://iandroid.uz/bl/photos/page_photo_arabic-$page_id." . $imageFileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_photo_arabic = '$photo_url' WHERE id = '$page_id'");

    }

    if($_FILES['page_photo_handw']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["page_photo_handw"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_photo_handw"]["tmp_name"], "../../photos/page_photo_handw-$page_id." . $imageFileType);

        $ver = upd_ver();
        
        $photo_url = "https://iandroid.uz/bl/photos/page_photo_handw-$page_id." . $imageFileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_photo_handw = '$photo_url' WHERE id = '$page_id'");

    }

    if($_FILES['page_photo_uzbek']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["page_photo_uzbek"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_photo_uzbek"]["tmp_name"], "../../photos/page_photo_uzbek-$page_id." . $imageFileType);

        $ver = upd_ver();
        
        $photo_url = "https://iandroid.uz/bl/photos/page_photo_uzbek-$page_id." . $imageFileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_photo_uzbek = '$photo_url' WHERE id = '$page_id'");

    }

    if($_FILES['page_photo_transc']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["page_photo_transc"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_photo_transc"]["tmp_name"], "../../photos/page_photo_transc-$page_id." . $imageFileType);

        $ver = upd_ver();
        
        $photo_url = "https://iandroid.uz/bl/photos/page_photo_transc-$page_id." . $imageFileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_photo_transc = '$photo_url' WHERE id = '$page_id'");

    }

    if($_FILES['page_audio_1']['name'] != null){

        $target_dir = "../../audio/";
        $target_file = $target_dir . basename($_FILES["page_audio_1"]["name"]);
        
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_audio_1"]["tmp_name"], "../../audio/page_audio_1-$page_id." . $FileType);

        $ver = upd_ver();
        
        $audio_url = "https://iandroid.uz/bl/audio/page_audio_1-$page_id." . $FileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_audio1 = '$audio_url' WHERE id = '$page_id'");

    }

    if($_FILES['page_audio_2']['name'] != null){

        $target_dir = "../../audio/";
        $target_file = $target_dir . basename($_FILES["page_audio_2"]["name"]);
        
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["page_audio_2"]["tmp_name"], "../../audio/page_audio_2-$page_id." . $FileType);

        $ver = upd_ver();
        
        $audio_url = "https://iandroid.uz/bl/audio/page_audio_2-$page_id." . $FileType . "?ver=$ver";

        $conn->query("UPDATE pages SET page_audio2 = '$audio_url' WHERE id = '$page_id'");

    }

}

header("Location: ./");

?>