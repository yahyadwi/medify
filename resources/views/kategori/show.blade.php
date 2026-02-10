@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Action Buttons --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ url('kategori-items') }}" class="btn btn-outline-secondary">
                ← Kembali
            </a>

            <a href="{{ url('kategori-items/' . $kategori->id . '/export-pdf') }}" class="btn btn-danger">
                Download PDF
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            Detail Kategori
                        </h5>
                    </div>

                    <div class="card-body">

                        {{-- Info Kategori --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <small class="text-muted">Kode Kategori</small>
                                <div class="fw-semibold">
                                    {{ $kategori->kode_kategori }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <small class="text-muted">Nama Kategori</small>
                                <div class="fw-semibold">
                                    {{ $kategori->nama_kategori }}
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- List Item --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Item dalam Kategori Ini</h5>
                            <span class="badge bg-secondary">
                                {{ $kategori->masterItems->count() }} Item
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 15%">Kode</th>
                                        <th>Nama Item</th>
                                        <th style="width: 20%">Jenis</th>
                                        <th style="width: 20%">Supplier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kategori->masterItems as $item)
                                        <tr>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->supplier }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                Belum ada item yang menggunakan kategori ini
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection