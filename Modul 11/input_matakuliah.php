<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Matakuliah</title>
    <style>
        /* Reset dasar */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: #ffffff; width: 100%; max-width: 450px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        h1 { text-align: center; font-size: 24px; font-weight: 600; margin-bottom: 24px; color: #1f2937; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px; color: #4b5563; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; transition: all 0.2s ease-in-out; }
        input[type="text"]:focus, input[type="number"]:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); }
        .btn-submit { width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; transition: background-color 0.2s; margin-top: 10px; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .back-link { display: block; text-align: center; margin-top: 16px; font-size: 14px; color: #6b7280; text-decoration: none; }
        .back-link:hover { color: #374151; text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Input Matakuliah</h1>
        <form id="form_matakuliah" action="proses_inputmatakuliah.php" method="post">
            <div class="form-group">
                <label for="kodeMk">Kode MK</label>
                <input type="text" name="kodeMk" id="kodeMk" placeholder="Masukkan Kode MK" required>
            </div>
            
            <div class="form-group">
                <label for="namaMK">Nama Matakuliah</label>
                <input type="text" name="namaMK" id="namaMK" placeholder="Masukkan Nama Matakuliah" required>
            </div>
            
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" placeholder="Contoh: 3" required>
            </div>
            
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" placeholder="Masukkan Total Jam" required>
            </div>

            <button type="submit" name="input" class="btn-submit">Simpan Data</button>
        </form>
    </div>

</body>
</html>
