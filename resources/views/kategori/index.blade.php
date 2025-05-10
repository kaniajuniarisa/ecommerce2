@extends('layouts.app')

@section('content')
    <h2>Produk kategori: {{ ucfirst($kategori) }}</h2>
    <div class="produk-container">
        @foreach($products as $product)
            <div class="produk-card">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <a href="{{ route('produk.show', $product->id) }}">
                    <button>Lihat Detail</button>
                </a>
            </div>
        @endforeach
    </div>
@endsection
