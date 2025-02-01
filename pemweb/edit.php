<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID tidak ditemukan.");
}

$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email= $_POST['email'];
    $sql = "UPDATE mahasiswa SET nama='$nama', jabatan='$jabatan', email='$email' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        <input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>" required>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
