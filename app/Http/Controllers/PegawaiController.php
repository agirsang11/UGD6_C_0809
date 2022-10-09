<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\PegawaiMail;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        //get pegawai
        $pegawai = Pegawai::latest()->simplePaginate(5);

        //render view with posts
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * create
     * 
     * @return void
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * store
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'nomor_induk_pegawai'   => 'required',
            'nama_pegawai'          => 'required',
            'id_departemen'         => 'required',
            'email'                 => 'required',
            'telepon'               => 'required',
            'gender'                => 'required',
            'status'                => 'required'
        ]);
    }
}
