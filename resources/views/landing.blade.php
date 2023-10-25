@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')

    @if ($featured)
        <div class="container">
            <div class="p-3 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2 class="display-7">ID Transaction : {{ $featured->id }}</h2>
                        <h6 class="lead">{{ $featured->created_at }}</h6>
                        <hr>
                        <h6>Type : {{ $featured->type }}</h6>
                        <h6>Category : {{ $featured->category }}</h6>
                        <p>{{ $featured->notes }}</p>
                        <a href="{{ route('transactions.show', $featured) }}" class="text-white fw-bold">
                            Show Detail
                        </a>
                    </div>
                </div>
            </div>
    @endif

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            @forelse ($transactions as $transaction)
                <div class="col-lg-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="50"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 96V320c0 35.3 28.7 64 64 64H576c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160c-35.3 0-64 28.7-64 64zm64 160c35.3 0 64 28.7 64 64H160V256zM224 96c0 35.3-28.7 64-64 64V96h64zM576 256v64H512c0-35.3 28.7-64 64-64zM512 96h64v64c-35.3 0-64-28.7-64-64zM288 208a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V360c0 66.3 53.7 120 120 120H520c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-39.8 0-72-32.2-72-72V120z" />
                    </svg>

                    <h5 class="pt-3">ID Transaction {{ $transaction->id }}</h5>
                    <h6>{{ $transaction->created_at }}</h6>
                        <hr>
                        <h6>Type : {{ $transaction->type }}</h6>
                        <h6>Category : {{ $transaction->category }}</h6>
                        <p>{{ $transaction->notes }}</p>
                    <a href="{{ route('transactions.show', $transaction) }}" class="fw-bold btn btn-info">
                        Show Detail
                    </a>
                </div><!-- /.col-lg-4 -->

            @empty
                <div class="col-md-12">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h2 class="card-text mb-auto">No articles found.</h2>
                        </div>
                    </div>
                </div>
            @endforelse
        </div><!-- /.row -->
    </div>

    <div class="d-flex justify-content-center pt-3">
        {!! $transactions->links() !!}
    </div>

@endsection
