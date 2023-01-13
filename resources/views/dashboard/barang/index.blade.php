<x-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Barang</li>
                        </ol>
                    </div>
                </div>
                <x-success-message />
                <x-failed-message />
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="/barang/create" class="btn btn-success">Tambah Data</a>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // No notes
                                            $counter = ($barangs->currentpage() - 1) * $barangs->perpage() + 1;
                                        @endphp
                                        @forelse ($barangs as $barang)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $barang->nama }}</td>
                                                <td>{{ $barang->jenis }}</td>
                                                <td>{{ $barang->merk }}</td>
                                                <td>{{ $barang->ukuran }}</td>
                                                <td>{{ $barang->stok }}</td>
                                                <td>
                                                    <form method="post" action="/barang/{{ $barang->id }}"
                                                        class="form-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="form-group mr-1">
                                                            <a href="/barang/{{ $barang->id }}/edit"
                                                                class="btn btn-info">Edit</a>
                                                        </div>
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('kamu yakin ingin menghapus ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>Data Barang Kosong</p>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end my-3">
                                    {{ $barangs->links() }}
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-layout>
