<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
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
            background-color: rgb(184, 80, 232);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: rgb(184, 80, 232); }
        h1 { text-align: center; color: #333; }
        .preview { text-align: center; margin-bottom: 20px; }
        .preview img { max-width: 200px; border-radius: 8px; }
    </style>
</head>
<body>

    <h1>Edit Produk: {{ $customer->name }}</h1>

    <form action="/admin/produk/{{ $customer->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Produk:</label>
        <input type="text" name="name" value="{{ $customer->name }}" required>

        <label>Slug:</label>
        <input type="text" name="slug" value="{{ $customer->slug }}" required>

        <label>Deskripsi:</label>
        <textarea name="description" required>{{ $customer->description }}</textarea>

        <label>Harga:</label>
        <input type="number" name="price" value="{{ $customer->price }}" required>

        <label>Kategori:</label>
        <input type="text" name="category" value="{{ $customer->category }}" required>

        <div class="preview">
            <p>Gambar Saat Ini:</p>
            <img src="/images/{{ $customer->image }}" alt="Gambar Produk">
        </div>

        <label>Gambar Baru (kosongkan jika tidak diubah):</label>
        <input type="file" name="image">

        <button type="submit">Update</button>
    </form>

</body>
</html>
