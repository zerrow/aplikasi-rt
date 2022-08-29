<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home/home');
    }
    // tampilan isi form warga
    public function form()
    {
        return view('home/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required',
            'nik' => 'required|max:18|min:18',
            'no_kk' => 'required|max:18|min:18',
            'jkel' => 'required|in:P,L',
            'tgl_lahir' => 'required|date',
            'status_kawin' => 'required|in:Belum,Sudah',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'kedudukan_keluarga' => 'required|in:Kepala,Anggota',
            'prov_ktp' => 'required',
            'kota_ktp' => 'required',
            'kec_ktp' => 'required',
            'kel_ktp' => 'required',
            'alamat_ktp' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors())
                ->withInput($request->input());
        }
        $alamat_ktp = $request->get('alamat_ktp') . ', '
            . $request->get('kel_ktp') . ', '
            . $request->get('kec_ktp') . ', '
            . $request->get('kota_ktp') . ', '
            . $request->get('prov_ktp');

        if ($request->get('alamat_sama') == null) {
            $alamat_tinggal = $request->get('alamat_ktp') . ', '
                . $request->get('kel_ktp') . ', '
                . $request->get('kec_ktp') . ', '
                . $request->get('kota_ktp') . ', '
                . $request->get('prov_ktp');
        } else {
            $alamat_tinggal = $alamat_ktp;
        }

        //        Insert Warga Table
        $warga = new Warga;
        $warga->id_bagian = Auth::user()->id_bagian;
        $warga->nama = $request->get('nama');
        $warga->nik = str_replace('-', '', $request->get('nik'));
        $warga->no_kk = str_replace('-', '', $request->get('no_kk'));
        $warga->agama = $request->get('agama');
        $warga->tgl_lahir = $request->get('tgl_lahir');
        $warga->jkel = $request->get('jkel');
        $warga->status_kawin = $request->get('status_kawin');
        $warga->pendidikan = $request->get('pendidikan');
        $warga->pekerjaan = $request->get('pekerjaan');
        $warga->kewarganegaraan = $request->get('kewarganegaraan');
        $warga->kedudukan_keluarga = $request->get('kedudukan_keluarga');
        $warga->alamat = addslashes($alamat_tinggal);
        $warga->alamat_ktp = addslashes($alamat_ktp);
        $warga->save();

//        Insert User Table
        $user = new User;
        $user->id_warga = $warga->id;
        $user->id_bagian = Auth::user()->id_bagian;
        $user->tipe = "Warga";
        $user->username = substr(strtolower($warga->nama), 0, 2) . substr($warga->nik, 13, 3);
        $user->password = substr(strtolower($warga->nama), 0, 3) . date('Y', strtotime($warga->tgl_lahir));
        $user->save();

        // return  redirect()->route('rt.penduduk.index');
    }
}
