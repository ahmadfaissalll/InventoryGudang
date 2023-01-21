<x-layout :title="'Notes'">
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
                  <x-failed-message />
            </div>
        </div>

        <div class="col-12">

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
                                </td>
                                <td>
                                    <center> <input type='text' class='form-control' name='konten' required />
                                    </center>
                                </td>
                                <td>
                                    <center>Saya, <strong
                                            title="nickname">{{ auth()->user()->nickname ?? 'Faisal' }}</strong>
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

                        @forelse ($notes as $note)
                            <tr>
                                <td>
                                    <center>{{ $counter++ }}</center>
                                </td>
                                <td>
                                    <center>{{ $note->konten }}</center>
                                </td>
                                <td><strong>
                                        <center title="nickname">{{ $note->user->nickname }}</center>
                                    </strong></td>
                                <td>
                                    @can('is-note-owner', $note)
                                        <center>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#editModal" id="editBtn"
                                                data-id="{{ $note->id }}">Edit</button>
                                            <form method='POST' action='{{ route('notes.destroy', $note->id) }}'
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type='submit' class='btn btn-danger btn-sm btn-delete'
                                                    value='Hapus'
                                                    onclick="return confirm('Anda yakin ingin menghapus note ini?')" />
                                            </form>
                                        </center>
                                    @else
                                        <center>Not yours</center>
                                    @endcan
                                </td>
                            </tr>
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Notes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Konten</label>
                                <textarea class="form-control" name="konten" id="konten"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var xhttp = new XMLHttpRequest()

        let editBtn = document.querySelectorAll('#editBtn')

        editBtn.forEach(element => {
            element.addEventListener('click', (elem) => {

                id = element.getAttribute('data-id')

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Typical action to be performed when the document is ready:

                        jsonResponse = JSON.parse(xhttp.responseText)

                        id = jsonResponse.id
                        konten = jsonResponse.konten

                        document.getElementById('form').action = `/dashboard/notes/${id}`
                        document.getElementById("konten").innerText = konten
                    }
                };

                xhttp.open("GET", `/notes/${id}`, true);
                xhttp.send();
            })
        });
    </script>
</x-layout>
