<?php
/** @var mysqli $con */ // @ts-ignore
include 'koneksi.php';

if (isset($_GET['idDosen'])) {
    $id = $_GET["idDosen"];
    $stmt = $con->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Query Error: " . $con->errno . " - " . $con->error);
    }

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $idDosen = $data["idDosen"];
        $namaDosen = $data["namaDosen"];
        $noHP = $data["noHP"];
    } else {
        header("location:viewdosen.php");
        exit;
    }
    $stmt->close();
} else {
    header("location:viewdosen.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', 'Segoe UI', sans-serif; background-color: #f3f4f6; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: #ffffff; width: 100%; max-width: 450px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        h1 { text-align: center; font-size: 24px; font-weight: 600; margin-bottom: 24px; color: #1f2937; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px; color: #4b5563; }
        input[type="text"] { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; transition: all 0.2s ease-in-out; }
        input[type="text"]:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); }
        input[disabled] { background-color: #e5e7eb; cursor: not-allowed; color: #6b7280; }
        .btn-submit { width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; transition: background-color 0.2s; margin-top: 10px; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .back-link { display: block; text-align: center; margin-top: 16px; font-size: 14px; color: #6b7280; text-decoration: none; }
        .back-link:hover { color: #374151; text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Edit Dosen</h1>
        <form id="form_dosen" action="proses_editdosen.php" method="post">
            
            <div class="form-group">
                <label for="idDosen">ID</label>
                <input type="hidden" name="idDosen" value="<?php echo htmlspecialchars($idDosen); ?>">
                <input type="text" name="idDosenDisabled" id="idDosenDisabled" value="<?php echo htmlspecialchars($idDosen); ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="namaDosen">Nama Dosen</label>
                <input type="text" name="namaDosen" id="namaDosen" value="<?php echo htmlspecialchars($namaDosen); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="noHP">Nomor HP</label>
                <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" required>
            </div>

            <button type="submit" name="edit" class="btn-submit">Update Data</button>
            <a href="viewdosen.php" class="back-link">Batal dan Kembali</a>
        </form>
    </div>

</body>
</html>