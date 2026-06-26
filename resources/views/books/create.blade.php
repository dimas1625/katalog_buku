@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

    <h3 class="mb-4">Tambah Buku</h3>

    <form action="{{ route('books.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="author" value="{{ old('author') }}"
                   class="form-control @error('author') is-invalid @enderror">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="year" value="{{ old('year') }}"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}"
                       class="form-control @error('stock') is-invalid @enderror">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="3"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>

@endsection