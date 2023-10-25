@extends('layouts.template')

@section('title', 'Create Transaction')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Transaksi Baru</h1>
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

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="col mb-3">
            <label for="amount">Amount (Nominal Rupiah):</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah transaksi" value="{{ old('amount') }}">
        </div>
        <div class="col mb-3">
            <div class="form-group">
                <label for="type">Tipe Transaksi:</label>
                <select class="form-control" id="type" name="type"></select>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
        </div>
        <div class="col mb-3">
            <div id="category-options">
                <label for="category">Kategori:</label>
                <select class="form-control" id="category" name="category">
                    <option value="uncategorized">Uncategorized</option>
                </select>
            </div>
        </div>
        <div class="col mb-3">
            <label for="notes">Catatan:</label>
            <textarea class="form-control" id="notes" name="notes" rows="4"
            placeholder="Tambahkan catatan transaksi">{{ old('notes') }}</textarea>
        </div>
        <div class="col mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

@endsection
