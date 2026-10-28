<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\M_Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class C_AdminSubject extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = M_Subject::orderBy('nama')
            ->paginate(10);

        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100', 'unique:subjects,nama'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'nama.unique' => 'Mata pelajaran tersebut sudah tersedia.',
            'nama.max' => 'Nama mata pelajaran maksimal 100 karakter.',
        ]);

        M_Subject::create($data);

        return redirect()->route('admin.subjects.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(M_Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, M_Subject $subject)
    {
        $data = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:100',
                Rule::unique('subjects', 'nama')->ignore($subject->id),
            ],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
        ], [
            'nama.required' => 'Nama mata pelajaran wajib diisi.',
            'nama.unique' => 'Nama mata pelajaran sudah digunakan.',
            'nama.max' => 'Nama mata pelajaran maksimal 100 karakter.',
        ]);

        $subject->update($data);

        return redirect()->route('admin.subjects.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(M_Subject $subject)
    {
        if ($subject->helpRequests()->exists()) {
            return redirect()->route('admin.subjects.index')
            ->with('error', 'Mata pelajaran tidak bisa dihapus karena sudah digunakan dalam pengajuan bantuan.');
        }

        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }

}
