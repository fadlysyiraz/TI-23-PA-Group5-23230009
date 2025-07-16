<?php

namespace App\Http\Controllers;

use App\Models\TiketJawaban;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Admin menandai tiket selesai
    public function selesai($id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->status = 'selesai';
        $tiket->save();
        return redirect()->route('ticket.list')->with('success', 'Tiket ditandai selesai.');
    }
    public function home()
    {
        // Redirect ke halaman admin jika role admin
        $user = auth()->user();
        if ($user && $user->role === 'admin') {
            return view('main.homeAdmin');
        }
        // Logic to display tickets untuk user biasa
        return view('main.home');
    }
    public function index()
    {
        // Ambil filter dari request
        $ticketId = request('idtiket');
        $email = request('email');

        $tikets = collect();
        if ($ticketId && $email) {
            // Cari user berdasarkan email
            $user = User::where('email', $email)->first();
            if ($user) {
                $tikets = Tiket::where('idtiket', $ticketId)
                    ->where('id_user', $user->id)
                    ->get();
            }
        }
        return view('main.history', compact('tikets'));
    }

    public function create()
    {
        return view('main.report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
            'kategori' => 'required',
        ]);

        // Ambil user yang sedang login
        $user = auth()->user();
        // Update nama user sesuai input form
        $user->nama = $request->nama;
        $user->save();

        // Generate idtiket random 4 digit
        $idtiket = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        // Simpan tiket ke database
        Tiket::create([
            'idtiket' => $idtiket,
            'id_user' => $user->id,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
            'status' => 'open',
            'NPM' => $request->npm,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('home')->with(['success' => 'Tiket berhasil dibuat', 'idtiket' => $idtiket]);
    }


    public function list()
    {
        $tikets = Tiket::orderByDesc('created_at')->get();
        return view('main.tiket_list', compact('tikets'));
    }

    public function show($id)
    {
        $tiket = Tiket::findOrFail($id);
        $jawaban = \App\Models\TiketJawaban::where('id_tiket', $id)->get();

        // Gunakan nama dari user jika nama tiket kosong atau hanya whitespace
        $nama = trim($tiket->nama);
        if ($tiket->id_user) {
            $user = User::find($tiket->id_user);
            if ($user) {
                $nama = $user->nama;
            }
        }

        return view('main.result', compact('tiket', 'jawaban', 'nama'));
    }


    // Admin membalas tiket
    public function jawab(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required',
        ]);
        $user = auth()->user();
        \App\Models\TiketJawaban::create([
            'id_tiket' => $id,
            'id_user' => $user->id,
            'jawaban' => $request->jawaban,
        ]);
        // Update status tiket menjadi 'proses' setelah admin membalas
        $tiket = Tiket::findOrFail($id);
        $tiket->status = 'proses';
        $tiket->save();
        // Redirect ke halaman list setelah admin membalas
        return redirect()->route('ticket.list')->with('success', 'Jawaban berhasil dikirim');
    }

    // public function edit($id)
    // {
    //     $tiket = Tiket::findOrFail($id);
    //     return view('main.edit', compact('tiket'));
    // }

    public function update(Request $request, $id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->update($request->all());
        return redirect()->route('home')->with('success', 'Tiket berhasil diupdate');
    }

    public function destroy($id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();
        return redirect()->route('home')->with('success', 'Tiket berhasil dihapus');
    }
}
