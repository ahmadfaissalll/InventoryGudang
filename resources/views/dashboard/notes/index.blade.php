<x-layout>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Notes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Notes</li>
                        </ol>
                    </div>
                </div>

                <x-success-message />
            </div>
        </div>

        <div class="col-12">
            {{-- <div class="card"> --}}
            {{-- <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2>Notes</h2>
                    </div>

                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Notes</li>
                      </ol>
                  </div> --}}

            <div class="market-status-table mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>
                                    <center> No </center>
                                </th>
                                <th>
                                    <center> Catatan </center>
                                </th>
                                <th>
                                    <center> Ditulis oleh </center>
                                </th>
                                <th>
                                    <center> Action </center>
                                </th>
                            </tr>
                        </thead>
                        <form method='POST' action='{{ route('notes.store') }}'>
                            @csrf
                            <tr class="table-active">
                                <td>
                                    {{-- <center><input type='hidden' /></center> --}}
                                </td>
                                <td>
                                    <center> <input type='text' class='form-control' name='konten' required />
                                    </center>
                                </td>
                                <td>
                                    <center>Saya, <strong>{{ auth()->user()->name ?? 'Faisal' }}</strong>
                                        {{-- <span class="badge badge-secondary"><?= $_SESSION['role'] ?? 'admin' ?></span> --}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <input type='submit' class='btn btn-primary btn-sm' value='Tambah' />
                                    </center>
                                </td>
                            <tr>
                        </form>

                        @php
                            // No notes
                            $counter = ($notes->currentpage() - 1) * $notes->perpage() + 1;
                        @endphp
                        @forelse ($notes as $key => $note)
                            <x-notes-row :note="$note" :counter="$counter" />

                            @php
                                $counter++;
                            @endphp
                        @empty
                            Listing Kosong
                        @endforelse

                    </table>

                    <div class="" style="float: right;">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</x-layout>
