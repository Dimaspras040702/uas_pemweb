<?php
include 'db.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $sql = "INSERT INTO mahasiswa (nama, jabatan, email) VALUES ('$nama', '$jabatan', '$email')";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pegawai</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Pegawai</h2>
    <div class="form-container">
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="jabatan" placeholder="Jabatan" required>
            <input type="text" name="email" placeholder="Email" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jabatan']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
    <form method="POST" action="edit.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit">Edit</button>
    </form>
    <form method="POST" action="delete.php" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="hapus" >Hapus</button>
    </form>
</td>

            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
