<!DOCTYPE html>
<html>
<head>
    <title>Admin - Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(184, 80, 232);
            color: white;
        }

        tr:hover {
            background-color: rgb(206, 152, 231);
        }

        a.button, button {
            padding: 8px 12px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        a.button.add {
            background-color: rgb(184, 80, 232);
            color: white;
        }

        a.button.edit {
            background-color: #f0ad4e;
            color: white;
        }

        button.delete {
            background-color: #d9534f;
            color: white;
        }

        .search-box {
            margin-bottom: 20px;
        }

        img {
            max-width: 120px;
            border-radius: 8px;
        }

        /* === PAGINATION STYLE === */
        .pagination {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 4px;
            margin-top: 20px;
            font-size: 11px;
        }

        .pagination ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 4px;
        }

        .pagination li {
            display: inline-block;
        }

        .pagination li a,
        .pagination li span {
            padding: 3px 6px;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #333;
            display: inline-block;
        }

        .pagination li.active span {
            background-color: rgb(184, 80, 232);
            color: white;
            border-color: rgb(184, 80, 232);
        }
        .pagination-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-top: 20px;
    font-size: 12px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 6px;
}

.pagination li {
    display: inline-block;
}

.pagination li a,
.pagination li span {
    padding: 6px 10px;
    text-decoration: none;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    border-radius: 20px;
    color: #555;
    font-weight: bold;
    transition: all 0.2s ease;
}

.pagination li a:hover {
    background-color: #ddd;
}

.pagination li.active span {
    background-color: rgb(184, 80, 232);
    color: white;
    border-color: rgb(184, 80, 232);
}


    </style>
</head>
<body>

    <h1>Daftar Produk</h1>

    <a href="/admin/produk/create" class="button add">+ Tambah Produk</a>

    <form method="GET" action="/admin/produk" class="search-box">
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($customers as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>Rp {{ number_format($item->price) }}</td>
            <td><img src="/images/{{ $item->image }}"></td>
            <td>
                <a href="{{ url('/admin/produk/' . $item->id . '/edit') }}" class="button edit">Edit</a>
                <form action="{{ url('/admin/produk/' . $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

<!-- TAMPILKAN PAGINATION -->
<div class="pagination-container">
    {{ $customers->onEachSide(1)->links() }}
</div>




</body>
</html>
