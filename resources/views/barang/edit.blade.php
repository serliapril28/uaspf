@extends('layouts.app')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('barang.update', ['barang' => $barang->kode_barang]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input class="form-control @error('kode_barang') is-invalid @enderror" type="text"
                                name="kode_barang" id="kode_barang"
                                value="{{ $errors->any() ? old('kode_barang') : $barang->kode_barang }}"
                                placeholder="Masukkan Kode Barang">
                            @error('kode_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text"
                                name="nama_barang" id="nama_barang"
                                value="{{ $errors->any() ? old('nama_barang') : $barang->nama_barang }}"
                                placeholder="Masukkan Nama Barang">
                            @error('nama_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga_barang" class="form-label">Harga Barang</label>
                            <input class="form-control @error('harga_barang') is-invalid @enderror" type="text"
                                name="harga_barang" id="harga_barang"
                                value="{{ $errors->any() ? old('harga_barang') : $barang->harga_barang }}"
                                placeholder="Masukkan Harga Barang">
                            @error('harga_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <input class="form-control @error('deskripsi_barang') is-invalid @enderror" type="text"
                                name="deskripsi_barang" id="deskripsi_barang"
                                value="{{ $errors->any() ? old('deskripsi_barang') : $barang->deskripsi_barang }}"
                                placeholder="Masukkan Deskripsi Barang">
                            @error('deskripsi_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan_barang" class="form-label">Satuan</label>
                            <select name="satuan_barang" id="satuan_barang" class="form-select">
                                @php
                                    $selected = '';
                                    if ($errors->any()) {
                                        $selected = old('satuan_barang');
                                    } else {
                                        $selected = $barang->satuan_barang;
                                    }
                                @endphp
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->kode_satuan }}"
                                        {{ $selected == $satuan->kode_satuan ? 'selected' : '' }}>
                                        {{ $satuan->kode_satuan . ' - ' . $satuan->nama_satuan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('satuan_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
