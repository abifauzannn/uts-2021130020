@extends('layouts.template')

@section('title', 'Show Detail Transaction')

@section('content')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>
    </div>

    <section class="section dashboard">
        <div class="row pt-4">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title border-bottom">Detail Transaksi</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $transaction->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Amount (Nominal Rupiah)</th>
                                            <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{ $transaction->type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>{{ $transaction->category }}</td>
                                        </tr>
                                        <tr>
                                            <th>Notes</th>
                                            <td>{{ $transaction->notes }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $transaction->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $transaction->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kembali</a>
                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->
                </div>
            </div>
        </div>
    </section>
@endsection
