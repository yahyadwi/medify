@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Tombol Kembali --}}
        <div class="mb-3">
            <a href="{{ url('master-items') }}" class="btn btn-outline-secondary">
                ← Kembali ke Daftar Item
            </a>
        </div>

        {{-- Filter --}}
        <div class="card mb-4">
            <div class="card-header">
                <strong>Filter Kategori</strong>
            </div>
            <div class="card-body">
                <form action="{{ url('kategori-items') }}" method="GET">
                    <div class="row align-items-end g-3">
                        <div class="col-md-4">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Cari nama kategori..."
                                value="{{ request('nama_kategori') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Kode Kategori</label>
                            <input type="text" name="kode_kategori" class="form-control" placeholder="Cari kode kategori..."
                                value="{{ request('kode_kategori') }}">
                        </div>

                        <div class="col-md-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100">
                                Cari
                            </button>
                            <a href="{{ url('kategori-items') }}" class="btn btn-secondary w-100">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar Kategori --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Daftar Kategori</strong>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    + Tambah Kategori
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20%">Kode</th>
                                <th>Nama Kategori</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $row->kode_kategori }}</td>
                                    <td>{{ $row->nama_kategori }}</td>
                                    <td>
                                        <a href="{{ url('kategori-items/' . $row->id) }}" class="btn btn-info btn-sm">
                                            Detail
                                        </a>

                                        <a href="{{ url('kategori-items/delete/' . $row->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini? Item tidak terhapus, hanya relasinya saja.')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Data kategori belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ url('kategori-items') }}" method="POST" class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Kategori</label>
                        <input type="text" name="kode_kategori" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection