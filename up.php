<?php


require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // POST değerlerini al

    $s1 = isset($_POST['s1']) ? $_POST['s1'] : '';

    $s2 = isset($_POST['s2']) ? $_POST['s2'] : '';

    $s3 = isset($_POST['s3']) ? $_POST['s3'] : '';

    $s4 = isset($_POST['s4']) ? $_POST['s4'] : '';

    $s5 = isset($_POST['s5']) ? $_POST['s5'] : '';

    $s6 = isset($_POST['s6']) ? $_POST['s6'] : '';

    $s7 = isset($_POST['s7']) ? $_POST['s7'] : '';

    $s8 = isset($_POST['s8']) ? $_POST['s8'] : '';

    $s9 = isset($_POST['s9']) ? $_POST['s9'] : '';

    $s10 = isset($_POST['s10']) ? $_POST['s10'] : '';

    $s11 = isset($_POST['s11']) ? $_POST['s11'] : '';

    $s12 = isset($_POST['s12']) ? $_POST['s12'] : '';

    $s13 = isset($_POST['s13']) ? $_POST['s13'] : '';

    $s14 = isset($_POST['s14']) ? $_POST['s14'] : '';

    $s15 = isset($_POST['s15']) ? $_POST['s15'] : '';


    try {

        $sql = "INSERT INTO `sicakliklar`(`s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`, `s12`, `s13`, `s14`, `s15`) VALUES  (:s1, :s2,:s3, :s4,:s5, :s6,:s7, :s8,:s9, :s10,:s11, :s12,:s13, :s14,:s15)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':s1', $s1);

        $stmt->bindParam(':s2', $s2);

        $stmt->bindParam(':s3', $s3);

        $stmt->bindParam(':s4', $s4);

        $stmt->bindParam(':s5', $s5);

        $stmt->bindParam(':s6', $s6);

        $stmt->bindParam(':s7', $s7);

        $stmt->bindParam(':s8', $s8);

        $stmt->bindParam(':s9', $s9);

        $stmt->bindParam(':s10', $s10);

        $stmt->bindParam(':s11', $s11);

        $stmt->bindParam(':s12', $s12);

        $stmt->bindParam(':s13', $s13);

        $stmt->bindParam(':s14', $s14);

        $stmt->bindParam(':s15', $s15);



        $stmt->execute();



        echo "Kayıt başarıyla eklendi!";
    } catch (\PDOException $e) {

        echo "Kayıt eklenirken bir hata oluştu: " . $e->getMessage();
    }
} else {

    echo "POST isteği bekleniyor.";
}
