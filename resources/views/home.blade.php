<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Depan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f9f9f9;
        }

        header {
            background-color: rgb(184, 80, 232);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            border-radius: 0 0 20px 20px;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 10px;
            padding: 20px;
            background-color: #fff;
        }

        .carousel img {
            width: 300px;
            height: 200px;
            border-radius: 10px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .kategori-section {
            text-align: center;
            margin: 30px 0;
        }

        .kategori-section h2 {
            margin-bottom: 20px;
        }

        .kategori-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .kategori-card {
            width: 120px;
            height: 120px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .kategori-card:hover {
            background-color: #d1c4e9;
            transform: scale(1.05);
        }

        .produk-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .produk-card {
            width: 250px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 0px 10px rgb(184, 80, 232);
        }

        .produk-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .produk-card button {
            margin: 5px;
            padding: 8px 12px;
            background-color: #6a1b9a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .produk-card button:hover {
            background-color: #8e24aa;
        }
    </style>
</head>
<body>

<header>Beauty care</header>

<div class="carousel" id="carousel">
    <!-- Carousel gambar produk -->
</div>

<div class="kategori-section">
    <h2>Apa yang sedang kamu butuhkan?</h2>
    <div class="kategori-container">
        <div class="kategori-card" onclick="filterProduk('skincare')">skincare</div>
        <div class="kategori-card" onclick="filterProduk('bodycare')">bodycare</div>
        <div class="kategori-card" onclick="filterProduk('makeup')">makeup</div>
        <div class="kategori-card" onclick="filterProduk('parfum')">parfum</div>
    </div>
</div>
<div style="text-align: center; margin: 20px;">
    <input type="text" id="searchInput" placeholder="Cari produk..." style="padding: 10px; width: 300px; border-radius: 8px; border: 1px solid #aaa;">
</div>


<div class="produk-container" id="produk-container"></div>

<script>
    let allProducts = [];

    fetch('/api/customers')
        .then(response => response.json())
        .then(res => {
            allProducts = res.data.data; // pakai paginate
            const container = document.getElementById('produk-container');
            const carousel = document.getElementById('carousel');

            // Tampilkan produk pertama kali
            renderProducts(allProducts);

            // Tambahkan gambar ke carousel
            allProducts.slice(0, 5).forEach(item => {
                const img = document.createElement('img');
                img.src = `/images/${item.image}`;
                img.alt = item.name;
                carousel.appendChild(img);
            });
        });

    function renderProducts(products) {
        const container = document.getElementById('produk-container');
        container.innerHTML = '';
        products.forEach(item => {
            const div = document.createElement('div');
            div.classList.add('produk-card');
            div.innerHTML = `
                <img src="/images/${item.image}" alt="${item.name}">
                <h3>${item.name}</h3>
                <p>Rp ${item.price}</p>
                <button onclick="orderWhatsApp('${item.name}')">Order</button>
                <a href="/produk/${item.id}"><button>Detail</button></a>
            `;
            container.appendChild(div);
        });
    }

    function filterProduk(kategori) {
    const filtered = allProducts.filter(item => {
        return item.category && item.category.toLowerCase() === kategori.toLowerCase();
    });
    renderProducts(filtered);
}


    document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase();
    const filtered = allProducts.filter(item => item.name.toLowerCase().includes(keyword));
    renderProducts(filtered);
});


    function orderWhatsApp(namaProduk) {
        const nomor = '6283199553512'; // Ganti dengan nomor kamu
        const pesan = `Saya ingin memesan produk: ${namaProduk}`;
        window.open(`https://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`, '_blank');
    }
</script>

</body>
</html>
