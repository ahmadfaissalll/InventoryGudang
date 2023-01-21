<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Note\{StoreRequest, UpdateRequest};
use Illuminate\Http\Request;

class NotesController extends Controller
{

  /**
   * Display a listing of the resource.
   * 
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $notes = Note::orderByDesc('created_at')->paginate(10);

    return view('dashboard.notes.index', ['notes' => $notes]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    $formFields = $request->validated();

    $formFields['id_user'] = auth()->id();

    Note::create($formFields);

    return redirect()->route('notes.index')->with('success', 'Notes berhasil ditambahkan');
  }

  public function update(UpdateRequest $request, Note $note)
  {
    $formFields = $request->validated();

    $note->update($formFields);

    return to_route('notes.index')->with('success', 'Notes berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Note $note)
  {
    // verifikasi pemilik notes
    if (Gate::denies('manipulate', $note)) {
      return to_route('notes.index')->with('failed', 'Maaf anda bukan pemilik notes ini');
    }

    Note::destroy($note->id);

    return to_route('notes.index')->with('success', 'Notes berhasil dihapus');
  }
}
