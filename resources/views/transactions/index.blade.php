@extends('layouts.template')

@section('title', 'Create Transaction')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Saldo Saat Ini</h5>
                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>Rp {{ number_format($balance, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Income</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>Rp {{ number_format($totalIncome, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Expense</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>Rp {{ number_format($totalExpense, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Transaksi Income</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>{{ number_format($numIncomeTransactions, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Transaksi Expense</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>{{ number_format($numExpenseTransactions, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                </div>
            </div>
        </div>
    </section>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Notes</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                <tr>
                    <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->category }}</td>
                    <td>{{ $transaction->notes }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <div class="col mb-3">
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary">Edit</a>
                        </div>

                        <div class="mb-3">
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">No Transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {!! $transactions->links() !!}
    </div>

@endsection
