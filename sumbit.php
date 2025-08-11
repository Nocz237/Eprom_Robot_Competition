<?php
// Buat folder uploads jika belum ada
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Proses data dari form
$team = htmlspecialchars($_POST['team']);
$participant1 = htmlspecialchars($_POST['participant1']);
$phone1 = htmlspecialchars($_POST['phone1']);
$participant2 = htmlspecialchars($_POST['participant2']);
$phone2 = htmlspecialchars($_POST['phone2']);
$institution = htmlspecialchars($_POST['institution']);
$email = htmlspecialchars($_POST['email']);
$category = htmlspecialchars($_POST['category']);

// Proses file upload
$uploadSuccess = false;
if (isset($_FILES['payment']) && $_FILES['payment']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['payment']['tmp_name'];
    $fileName = $_FILES['payment']['name'];
    $fileSize = $_FILES['payment']['size'];
    $fileType = $_FILES['payment']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Ubah nama file supaya unik
    $newFileName = uniqid() . '.' . $fileExtension;
    $dest_path = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $uploadSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #0f0c29;
            color: white;
            padding: 20px;
        }
        .container {
            background: #1f1f2e;
            padding: 25px;
            border-radius: 12px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,255,255,0.2);
        }
        img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran Berhasil</h2>
        <p><strong>Nama Tim:</strong> <?= $team ?></p>
        <p><strong>Nama Peserta 1:</strong> <?= $participant1 ?></p>
        <p><strong>Nomor Peserta 1:</strong> <?= $phone1 ?></p>
        <p><strong>Nama Peserta 2:</strong> <?= $participant2 ?></p>
        <p><strong>Nomor Peserta 2:</strong> <?= $phone2 ?></p>
        <p><strong>Asal Instansi:</strong> <?= $institution ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Kategori Lomba:</strong> <?= ucfirst($category) ?></p>

        <?php if ($uploadSuccess): ?>
            <p><strong>Bukti Pembayaran:</strong></p>
            <img src="<?= $dest_path ?>" alt="Bukti Pembayaran" />
        <?php else: ?>
            <p style="color: red;"><strong>Upload bukti pembayaran gagal.</strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
