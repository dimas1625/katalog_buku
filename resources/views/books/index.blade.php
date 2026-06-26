@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Buku</h3>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control" placeholder="Cari judul atau penulis...">
        </div>
        <div class="col-md-3">
            <select name="category_id" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="title" {{ $sort == 'title' ? 'selected' : '' }}>Urutkan: Judul</option>
                <option value="author" {{ $sort == 'author' ? 'selected' : '' }}>Urutkan: Penulis</option>
                <option value="year" {{ $sort == 'year' ? 'selected' : '' }}>Urutkan: Tahun</option>
                <option value="stock" {{ $sort == 'stock' ? 'selected' : '' }}>Urutkan: Stok</option>
            </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-outline-secondary w-100">Terapkan</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-dark">
                <tr>
                    <th>
                        <a href="{{ route('books.index', array_merge(request()->query(), ['sort' => 'title', 'direction' => $sort == 'title' && $direction == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Judul {{ $sort == 'title' ? ($direction == 'asc' ? '↑' : '↓') : '' }}
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('books.index', array_merge(request()->query(), ['sort' => 'author', 'direction' => $sort == 'author' && $direction == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Penulis {{ $sort == 'author' ? ($direction == 'asc' ? '↑' : '↓') : '' }}
                        </a>
                    </th>
                    <th>Kategori</th>
                    <th>
                        <a href="{{ route('books.index', array_merge(request()->query(), ['sort' => 'year', 'direction' => $sort == 'year' && $direction == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Tahun {{ $sort == 'year' ? ($direction == 'asc' ? '↑' : '↓') : '' }}
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('books.index', array_merge(request()->query(), ['sort' => 'stock', 'direction' => $sort == 'stock' && $direction == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Stok {{ $sort == 'stock' ? ($direction == 'asc' ? '↑' : '↓') : '' }}
                        </a>
                    </th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name ?? '-' }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Ubah</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $books->links() }}

@endsection