@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-4">

        <!-- Welcome Card -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-1">Selamat datang, {{ Auth::user()->name }}! 👋</h5>
                    <p class="text-muted mb-3">Kelola koleksi buku kamu dari sini.</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-book fs-3 text-primary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Buku</div>
                        <div class="fs-3 fw-bold">{{ \App\Models\Book::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-tags fs-3 text-success"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Kategori</div>
                        <div class="fs-3 fw-bold">{{ \App\Models\Category::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-stack fs-3 text-warning"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Stok</div>
                        <div class="fs-3 fw-bold">{{ \App\Models\Book::sum('stock') }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection