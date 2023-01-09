@props(['note', 'counter'])
<tr>
    <td>
        <center>{{ $counter }}</center>
    </td>
    <td>
        <center>{{ $note->konten }}</center>
    </td>
    <td><strong>
            <center>{{ $note->user->nickname }}</center>
        </strong></td>
    <td>
        <center>
            <form method='POST' action='{{ route('notes.destroy', $note->id) }}' class="inline">
                @csrf
                @method('DELETE')
                <input type='submit' class='btn btn-danger btn-sm btn-delete' value='Hapus' onclick="return confirm('Anda yakin ingin menghapus note ini?')" />
            </form>
        </center>
    </td>
</tr>