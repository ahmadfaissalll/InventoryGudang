<x-layout :title="'Edit Data Barang Masuk'">
    <div class="content-wrapper px-4">
        <section class="content-header">
            {{-- <div class=""> --}}
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/barang-masuk">Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            {{-- </div> --}}
        </section>
        <div class="card card-primary">
            <div class="card-header p-1">
            </div>

            <form method="post" action="/dashboard/barang-masuk/{{ $barangMasuk->id }}" class="form-group">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="custom-select @error('id_barang') is-invalid @enderror" id="id_barang"
                            name="id_barang" placeholder="Select siswa">
                            <option value="">Pilih barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" @selected($barang->id == $barangMasuk->barang->id)>
                                    {{ $barang->nama }}</option>
                            @endforeach
                        </select>

                        @error('id_barang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid  @enderror" id="jumlah"
                            name="jumlah" value="{{ old('jumlah') ?? $barangMasuk->jumlah }}">

                        @error('jumlah')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control  @error('pengirim') is-invalid @enderror"
                            id="pengirim" name="pengirim" value="{{ old('pengirim') ?? $barangMasuk->pengirim }}">

                        @error('pengirim')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea type="text" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan"
                            name="keterangan" style="min-height: 30px;">{{ old('keterangan') ?? $barangMasuk->keterangan }}</textarea>

                        @error('keterangan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" min="0"
                            class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                            value="{{ old('tanggal') ?? Carbon\Carbon::parse($barangMasuk->tanggal)->translatedFormat('Y-m-d') }}">

                        @error('tanggal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
