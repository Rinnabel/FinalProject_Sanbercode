<?php

namespace App\Http\Controllers\jawaban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\jawaban\Jawaban; 
use App\User;

class JawabanController extends Controller
{
    public function store(Request $request)
    { 
        $this->validasi($request);

        Answer::create([
            'jawaban' => $request->jawaban,
            'profile_id' => Auth::profile()->id,
            'pertanyaan_id' => $request->pertanyaan_id,
        ]);

        return redirect(route('pertanyaan.show', ['pertanyaan' => $request->pertanyaan_id]))->with('success','Berhasil Menambahkan Jawaban!');
    }

    private function validasi($request){
        $rules = [
            'jawaban' => 'required', 
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.', 
        ];

        $request->validate($rules, $customMessages);
    }
}
