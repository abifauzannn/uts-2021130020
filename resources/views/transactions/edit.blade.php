@extends('layouts.template')

@section('title', 'Edit Transaction')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Transaksi</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('transactions.update', $transaction) }}">
    @csrf
    @method('PUT')
    <div class="col mb-3">
        <label for="amount">Amount (Nominal Rupiah):</label>
        <input type="text" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah transaksi" value="{{ old('amount', $transaction->amount) }}">
    </div>
    <div class="col mb-3">
        <div class="form-group">
            <label for="type">Tipe Transaksi:</label>
            <select class="form-control" id="type" name="type">
                <option value="income" {{ (old('type', $transaction->type) == 'income') ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ (old('type', $transaction->type) == 'expense') ? 'selected' : '' }}>Expense</option>
            </select>
        </div>
    </div>
    <div class="col mb-3">
        <div id="category-options">
            <label for="category">Kategori:</label>
            <select class="form-control" id="category" name="category">
                <option value="uncategorized" {{ (old('category', $transaction->category) == 'uncategorized') ? 'selected' : '' }}>Uncategorized</option>
                @if (old('type', $transaction->type) === 'income')
                    <!-- Pilihan kategori berdasarkan jenis transaksi "income" -->
                    <option value="wage" {{ (old('category', $transaction->category) == 'wage') ? 'selected' : '' }}>Wage</option>
                    <option value="bonus" {{ (old('category', $transaction->category) == 'bonus') ? 'selected' : '' }}>Bonus</option>
                    <option value="gift" {{ (old('category', $transaction->category) == 'gift') ? 'selected' : '' }}>Gift</option>
                @elseif (old('type', $transaction->type) === 'expense')
                    <!-- Pilihan kategori berdasarkan jenis transaksi "expense" -->
                    <option value="food_drinks" {{ (old('category', $transaction->category) == 'food_drinks') ? 'selected' : '' }}>Food & Drinks</option>
                    <option value="shopping" {{ (old('category', $transaction->category) == 'shopping') ? 'selected' : '' }}>Shopping</option>
                    <option value="charity" {{ (old('category', $transaction->category) == 'charity') ? 'selected' : '' }}>Charity</option>
                    <option value="housing" {{ (old('category', $transaction->category) == 'housing') ? 'selected' : '' }}>Housing</option>
                    <option value="insurance" {{ (old('category', $transaction->category) == 'insurance') ? 'selected' : '' }}>Insurance</option>
                    <option value="taxes" {{ (old('category', $transaction->category) == 'taxes') ? 'selected' : '' }}>Taxes</option>
                    <option value="transportation" {{ (old('category', $transaction->category) == 'transportation') ? 'selected' : '' }}>Transportation</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col mb-3">
        <label for="notes">Catatan:</label>
        <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Tambahkan catatan transaksi">{{ old('notes', $transaction->notes) }}</textarea>
    </div>
    <div class="col mb-3">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
</form>
@endsection
