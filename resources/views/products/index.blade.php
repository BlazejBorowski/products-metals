@extends('layouts.app')

@section('page-header', 'Produkty')

@section('header-actions')
<a href="{{ route('products.create') }}" class="btn btn-primary rounded-0">Dodaj Produkt</a>
@endsection

@section('content')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="table text-center align-middle">
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Metal</th>
                    <th>Waga (g)</th>
                    <th>Cena bazowa</th>
                    <th>Zmiana</th>
                    <th>Cena finalna</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="text-center align-middle">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->metal->value }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ number_format($product->base_price, 2, ',', ' ') }} zł</td>
                        <td>
                            <span>{{ number_format($product->change_percent, 2, ',', ' ') }} %</span><br>
                            <span>{{ number_format($product->change_value, 2, ',', ' ') }} zł</span>
                        </td>
                        <td>{{ number_format($product->final_price, 2, ',', ' ') }} zł</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="text-primary text-decoration-underline d-block m-0">Edytuj</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger text-decoration-underline p-0 m-0"
                                        onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center align-middle">Brak produktów</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
