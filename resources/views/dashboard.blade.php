@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <h4 class="fw-bold">Dashboard</h4>
            <p class="text-muted">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
        </div>

        <!-- Stats Cards -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-book fs-3 text-primary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Buku</div>
                        <div class="fs-4 fw-bold">{{ \App\Models\Book::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-tags fs-3 text-success"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Kategori</div>
                        <div class="fs-4 fw-bold">{{ \App\Models\Category::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-stack fs-3 text-warning"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Stok</div>
                        <div class="fs-4 fw-bold">{{ \App\Models\Book::sum('stock') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Action -->
        <div class="col-12">
            <a href="{{ route('books.index') }}" class="btn btn-dark">
                <i class="bi bi-list-ul me-1"></i>Lihat Daftar Buku
            </a>
            <a href="{{ route('books.create') }}" class="btn btn-outline-dark ms-2">
                <i class="bi bi-plus-lg me-1"></i>Tambah Buku
            </a>
        </div>
    </div>
@endsection