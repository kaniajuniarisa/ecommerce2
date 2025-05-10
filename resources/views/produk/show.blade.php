@extends('layouts.app')

@section('content')
<style>
    .product-detail-container {
        display: flex;
        gap: 30px;
        padding: 30px;
        max-width: 1000px;
        margin: auto;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(241, 49, 49, 0.1);
    }

    .product-detail-image img {
        width: 350px;
        border-radius: 10px;
    }

    .product-detail-info {
        flex: 1;
    }

    .product-detail-info h1 {
        margin-top: 0;
    }

    .product-detail-info p {
        margin: 10px 0;
    }

    .product-detail-buttons {
        margin-top: 30px;
    }

    .product-detail-buttons button {
    padding: 10px 20px;
    margin-right: 15px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-weight: bold;
}

.btn-order {
    background-color:rgb(18, 179, 101);
    margin-bottom: 15px; 
}

.btn-order:hover {
    background-color:rgb(44, 198, 57);
}

.btn-back {
    background-color:rgb(27, 34, 236);
}

.btn-back:hover {
    background-color:rgb(0, 0, 0);
}

</style>

<div class="product-detail-container">
    <div class="product-detail-image">
        <img src="{{ asset('images/' . $customer->image) }}" alt="{{ $customer->name }}">
    </div>

    <div class="product-detail-info">
        <h1>{{ $customer->name }}</h1>
        <p><strong>Harga:</strong> Rp {{ number_format($customer->price, 0, ',', '.') }}</p>
        <p><strong>Kategori:</strong> {{ $customer->category }}</p>
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $customer->description }}</p>

        <div class="product-detail-buttons">
            <a href="https://wa.me/6283199553512?text={{ urlencode('Saya ingin memesan produk: ' . $customer->name) }}" target="_blank">
                <button class="btn-order">Order</button>
            </a>

            <a href="{{ url('/') }}">
                <button class="btn-back">Kembali</button>
            </a>
        </div>
    </div>
</div>
@endsection
