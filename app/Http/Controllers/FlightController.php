<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function create()
    {
        $datas = DB::select(
            'SELECT * FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket'
        );

        return view('penumpang.add')->with('datas', $datas);
    }

    public function createpassenger()
    {
        $datas = DB::select(
            'SELECT * FROM penumpang'
        );
        return view('penumpang.addpassenger')->with('datas', $datas);
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
            'nomor_kursi' => 'required',
            'tanggal_pemesanan' => 'required',
            // 'harga_tiket' => 'required',
        ]);

        $namaPenumpang = $request->nama_penumpang;
        $nomorTelepon = $request->nomor_telepon;
        $alamatPenumpang = $request->alamat_penumpang;
        $nomorKursi = $request->nomor_kursi;
        $tanggalPemesanan = $request->tanggal_pemesanan;
        // $hargaTiket = $request->harga_tiket;
        $idTiket = $request->id_tiket;

        // Ensure the number of placeholders matches the number of actual values
        DB::insert(
            'INSERT INTO penumpang(nama_penumpang, nomor_telepon, alamat_penumpang, id_tiket, deleted) VALUES (?, ?, ?, ?, 0)',
            [$namaPenumpang, $nomorTelepon, $alamatPenumpang, $idTiket]
        );

        return redirect()->route('penumpang.index')->with('success', 'Penumpang Data has been added');
    }

    public function storepassenger(Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
        ]);

        $namaPenumpang = $request->nama_penumpang;
        $nomorTelepon = $request->nomor_telepon;
        $alamatPenumpang = $request->alamat_penumpang;
        $idTiket = $request->id_tiket;

        // Ensure the number of placeholders matches the number of actual values
        DB::insert(
            'INSERT INTO penumpang(nama_penumpang, nomor_telepon, alamat_penumpang, id_tiket, deleted) VALUES (?, ?, ?, ?, 0)',
            [$namaPenumpang, $nomorTelepon, $alamatPenumpang, $idTiket]
        );

        return redirect()->route('penumpang.passenger')->with('success', 'Penumpang Data has been added');
    }


    // public function show all values from a table
    public function index()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 0'
        );

        return view('penumpang.index')->with('datas', $datas);
    }

    public function passenger()
    {
        $datas = DB::select(
            'SELECT * FROM `penumpang` WHERE deleted = 0'
        );

        return view('penumpang.passenger')->with('datas', $datas);
    }

    public function airline()
    {
        $datas = DB::select(
            'SELECT * FROM `maskapai`'
        );

        return view('penumpang.airline')->with('datas', $datas);
    }

    public function flight()
    {
        $datas = DB::select(
            'SELECT * FROM `penerbangan`'
        );

        return view('penumpang.flight')->with('datas', $datas);
    }

    public function trash()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 1'
        );

        return view('penumpang.trash')->with('datas', $datas);
    }


    public function ascending()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 0
            ORDER BY nama_penumpang ASC
            '
        );

        return view('penumpang.index')->with('datas', $datas);
    }

    public function ascendingtrash()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 1
            ORDER BY nama_penumpang ASC
            '
        );

        return view('penumpang.trash')->with('datas', $datas);
    }

    public function ascendingpassenger()
    {
        $datas = DB::select(
            'SELECT *
            FROM penumpang
            WHERE deleted = 0
            ORDER BY nama_penumpang ASC
            '
        );

        return view('penumpang.passenger')->with('datas', $datas);
    }

    public function descending()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 0
            ORDER BY nama_penumpang DESC
            '
        );

        return view('penumpang.index')->with('datas', $datas);
    }

    public function descendingtrash()
    {
        $datas = DB::select(
            'SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE deleted = 1
            ORDER BY nama_penumpang DESC
            '
        );

        return view('penumpang.trash')->with('datas', $datas);
    }

    public function descendingpassenger()
    {
        $datas = DB::select(
            'SELECT *
            FROM penumpang
            WHERE deleted = 0
            ORDER BY nama_penumpang DESC
            '
        );

        return view('penumpang.passenger')->with('datas', $datas);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT penumpang.*, tiket.*, maskapai.*
            FROM penumpang
            INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
            INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
            WHERE nama_penumpang LIKE '%$query%' AND deleted = 0
        ");

        return view('penumpang.index')->with('datas', $datas);
    }

    public function searchpassenger(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT *
            FROM penumpang
            WHERE deleted = 0
            AND nama_penumpang LIKE '%$query%'
        ");

        return view('penumpang.passenger')->with('datas', $datas);
    }

    public function searchairline(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT *
            FROM maskapai
            WHERE nama_maskapai LIKE '%$query%'
        ");

        return view('penumpang.airline')->with('datas', $datas);
    }

    public function searchflight(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT *
            FROM penerbangan
            WHERE id_penerbangan LIKE '%$query%'
        ");

        return view('penumpang.flight')->with('datas', $datas);
    }


    public function searchtrash(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
        SELECT penumpang.*, tiket.*, maskapai.*
        FROM penumpang
        INNER JOIN tiket ON penumpang.id_tiket = tiket.id_tiket
        INNER JOIN maskapai ON maskapai.id_tiket = tiket.id_tiket
        WHERE nama_penumpang LIKE '%$query%' AND deleted = 1
    ");

        return view('penumpang.index')->with('datas', $datas);
    }





    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select('
            SELECT p.id_penumpang, p.nama_penumpang, p.nomor_telepon, p.alamat_penumpang, t.nomor_kursi, t.tanggal_pemesanan
            FROM penumpang p
            INNER JOIN tiket t ON p.id_tiket = t.id_tiket
            WHERE p.id_tiket = ?
        ', [$id]);

        if (!empty($data)) {
            $data = $data[0]; // Ambil hanya baris pertama dari hasil query
        } else {
            // Handle jika data tidak ditemukan
            // Contohnya:
            return redirect()->route('penumpang.index')->with('error', 'Data not found');
        }

        return view('penumpang.edit')->with('data', $data); // Render the edit view with the fetched data
    }

    public function editpassenger($id)
    {
        $data = DB::select('
            SELECT p.id_penumpang, p.nama_penumpang, p.nomor_telepon, p.alamat_penumpang
            FROM penumpang p
        ',);

        if (!empty($data)) {
            $data = $data[0]; // Ambil hanya baris pertama dari hasil query
        } else {
            // Handle jika data tidak ditemukan
            // Contohnya:
            return redirect()->route('penumpang.index')->with('error', 'Data not found');
        }

        return view('penumpang.editpassenger')->with('data', $data); // Render the edit view with the fetched data
    }



    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
            'nomor_kursi' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Update tabel penumpang
            DB::update(
                'UPDATE penumpang SET nama_penumpang = :nama_penumpang, nomor_telepon = :nomor_telepon, alamat_penumpang = :alamat_penumpang WHERE id_penumpang = :id',
                [
                    'id' => $id,
                    'nama_penumpang' => $request->nama_penumpang,
                    'nomor_telepon' => $request->nomor_telepon,
                    'alamat_penumpang' => $request->alamat_penumpang,
                ]
            );

            // Update tabel tiket
            DB::update(
                'UPDATE tiket SET nomor_kursi = :nomor_kursi, tanggal_pemesanan = :tanggal_pemesanan WHERE id_tiket IN (SELECT id_tiket FROM penumpang WHERE id_penumpang = :id)',
                [
                    'id' => $id,
                    'nomor_kursi' => $request->nomor_kursi,
                    'tanggal_pemesanan' => $request->tanggal_pemesanan,
                ]
            );

            DB::commit(); // Commit transaction jika kedua update berhasil
            return redirect()->route('penumpang.index')->with('success', 'Passenger data has been changed');
        } catch (\Exception $e) {
            DB::rollback(); // Rollback jika terjadi error
            return redirect()->back()->with('error', 'Failed to update data');
        }


        return redirect()->route('penumpang.index')->with('success', 'Passenger data has been changed');
    }

    public function updatepassenger($id, Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Update tabel penumpang
            DB::update(
                'UPDATE penumpang SET nama_penumpang = :nama_penumpang, nomor_telepon = :nomor_telepon, alamat_penumpang = :alamat_penumpang WHERE id_penumpang = :id',
                [
                    'id' => $id,
                    'nama_penumpang' => $request->nama_penumpang,
                    'nomor_telepon' => $request->nomor_telepon,
                    'alamat_penumpang' => $request->alamat_penumpang,
                ]
            );

            DB::commit(); // Commit transaction jika kedua update berhasil
            return redirect()->route('penumpang.passenger')->with('success', 'Passenger data has been changed');
        } catch (\Exception $e) {
            DB::rollback(); // Rollback jika terjadi error
            return redirect()->back()->with('error', 'Failed to update data');
        }


        return redirect()->route('penumpang.passenger')->with('success', 'Passenger data has been changed');
    }

    // public function to delete a row from a table
    public function delete($id)
    {
        $sql = "UPDATE penumpang SET deleted = 1 WHERE id_penumpang = :id_penumpang";

        DB::update($sql, ['id_penumpang' => $id]);

        return redirect()->route('penumpang.index')->with('success', 'Penumpang Data has been sent to trash');
    }

    public function deletepassenger($id)
    {
        $sql = "UPDATE penumpang SET deleted = 1 WHERE id_penumpang = :id_penumpang";

        DB::update($sql, ['id_penumpang' => $id]);

        return redirect()->route('penumpang.passenger')->with('success', 'Penumpang Data has been sent to trash');
    }


    public function deletereal($id)
    {
        DB::delete('DELETE FROM penumpang WHERE id_penumpang = :id_penumpang', ['id_penumpang' => $id]);
        return redirect()->route('penumpang.trash')->with('success', 'Data penumpang berhasil dihapus');
    }
}
