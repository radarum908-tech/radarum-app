<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Penilaian\Borang;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function reviewer(){
        if (Auth::user()->role !== 'reviewer') {
            return abort(403, 'Unauthorized');
        }

        $akun = User::all(); // Tarik semua data akun
        $kampusList = User::whereHas('borangs')->withCount('borangs')->get();
        $totalBorang = Borang::count(); // total semua borang
        $totalKampus = User::where('role', 'kampus')->count(); // total akun role kampus

        return view('reviewer.reviewer', compact('akun','kampusList','totalBorang','totalKampus'));
    }
    function kampus(){
        if (Auth::user()->role !== 'kampus') {
            return abort(403, 'Unauthorized');
        }

        return view('kampus.kampus');
    }

    function index(){
        return view('auth/login');
    }
    function login(Request $request){
        $request->validate([
            'email_kampus' => 'required',
            'password' => 'required'
        ],[
            'email_kampus.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',

        ]);

        $infologin = [
            'email_kampus' => $request->input('email_kampus'),
            'password' => $request->input('password')

        ];


        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'kampus') {
                return redirect('kampus');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'reviewer') {
                return redirect('reviewer');
            }
        }
        else {
            return redirect('/login')->withErrors(['email' => 'Email atau Password salah']);
        }
        }


    function register(){
        return view('auth/register');
    }

   function create(Request $request){
    $request->validate([
        'nama_kampus' => 'required',
        'alamat' => 'required',
        'provinsi' => 'required',
        'email_kampus' => 'required|email|unique:akun,email_kampus',
        'password' => 'required|min:6',
        'nomor_telepon' => 'required',
        'website_kampus' => 'nullable',
        'koordinator_program' => 'required',
        'email_koordinator' => 'required|email',
        'logo_kampus' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $logoPath = null;
    if ($request->hasFile('logo_kampus')) {
        $logoPath = $request->file('logo_kampus')->store('logos', 'public');
    }


    $data = [
    'nama_kampus'         => $request->input('nama_kampus'),
    'alamat'              => $request->input('alamat'),
    'provinsi'            => $request->input('provinsi'),
    'email_kampus'        => $request->input('email_kampus'),
    'password'            => Hash::make($request->input('password')),
    'nomor_telepon'       => $request->input('nomor_telepon'),
    'website_kampus'      => $request->input('website_kampus'),
    'koordinator_program' => $request->input('koordinator_program'),
    'email_koordinator'   => $request->input('email_koordinator'),
    'logo_kampus'         => $logoPath,
    'role'                => 'kampus'

    ];

    // Proses upload logo jika ada

    User::create($data);

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');


    }

    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }

    public function disclaimer(){
        return view()->make('disclaimer');
    }
}
