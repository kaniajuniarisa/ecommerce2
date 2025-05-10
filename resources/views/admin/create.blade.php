<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        form { background: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color:rgb(184, 80, 232);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color:rgb(184, 80, 232); }
        h1 { text-align: center; color: #333; }
    </style>
</head>
<body>

    <h1>Tambah Produk Baru</h1>

    <form method="POST" action="/admin/produk" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk:</label>
        <input type="text" name="name" required>

        <label>Slug:</label>
        <input type="text" name="slug" required>

        <label>Deskripsi:</label>
        <textarea name="description" required></textarea>

        <label>Harga:</label>
        <input type="number" name="price" required>

        <label>Kategori:</label>
        <input type="text" name="category" required>

        <label>Gambar:</label>
        <input type="file" name="image" required>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
