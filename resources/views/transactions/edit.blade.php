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
                    <!-- Tambahkan opsi kategori lainnya dengan pengecekan old() -->
                </select>
            </div>
        </div>
        <div class="col mb-3">
            <label for="notes">Catatan:</label>
            <textarea class="form-control" id="notes" name="notes" rows="4"
                placeholder="Tambahkan catatan transaksi">{{ old('notes', $transaction->notes) }}</textarea>
        </div>
        <div class="col mb-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>

@endsection
