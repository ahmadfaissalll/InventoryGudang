<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
    $notes = Note::latest()->paginate(10);

    return view('dashboard.notes.index', ['notes' => $notes]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $formFields = $request->validate([
      'konten' => 'required',
    ]);

    $formFields['id_user'] = 2;

    Note::create($formFields);

    return redirect()->route('notes.index')->with('success', 'Notes berhasil ditambahkan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Note $note)
  {
    Note::destroy($note->id);

    return back()->with('success', 'Notes berhasil dihapus');
  }
}
