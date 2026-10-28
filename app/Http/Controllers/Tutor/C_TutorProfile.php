<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\M_Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class C_TutorProfile extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $profile = $user->tutorProfile;

        // Pastikan profil tersedia
        if (!$profile) {
            abort(404, 'Profil tutor tidak ditemukan.');
        }

        $subjects = M_Subject::orderBy('nama')->get();

        return view('tutor.profile', compact(
            'user',
            'profile',
            'subjects'
        ));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $profile = $user->tutorProfile;

        if (!$profile) {
            abort(404, 'Profil tutor tidak ditemukan.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'subject_ids' => ['required', 'array', 'min:1'],
            'subject_ids.*' => [
                'required',
                'integer',
                Rule::exists('subjects', 'id'),
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'bio.max' => 'Biodata maksimal 1000 karakter.',
            'subject_ids.required' => 'Pilih minimal satu mata pelajaran.',
            'subject_ids.min' => 'Pilih minimal satu mata pelajaran.',
            'subject_ids.*.exists' => 'Ada mata pelajaran yang tidak valid.',
        ]);

        $user->update([
            'name' => $data['name'],
        ]);

        $profile->update([
            'bio' => $data['bio'] ?? null,
        ]);

        $profile->subjects()->sync(
            array_unique($data['subject_ids'])
        );

        return redirect()
            ->route('tutor.profile.edit')
            ->with('success', 'Profil tutor berhasil diperbarui.');
    }
}
