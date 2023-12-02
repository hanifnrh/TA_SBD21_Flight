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

        return view('admin.add')->with('datas', $datas);
    }

    public function createpassenger()
    {
        $datas = DB::select(
            'SELECT * FROM penumpang'
        );
        return view('admin.addpassenger')->with('datas', $datas);
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
            'nomor_kursi' => 'required',
            'tanggal_pemesanan' => 'required'
        ]);

        $namaPenumpang = $request->nama_penumpang;
        $nomorTelepon = $request->nomor_telepon;
        $alamatPenumpang = $request->alamat_penumpang;
        $nomorKursi = $request->nomor_kursi;
        $tanggalPemesanan = $request->tanggal_pemesanan;
        $idTiket = $request->id_tiket;

        // Check if the seat number already exists
        $existingSeat = DB::select('SELECT COUNT(*) AS count FROM penumpang WHERE nomor_kursi = ?', [$nomorKursi])[0]->count;

        if ($existingSeat > 0) {
            return redirect()->back()->with('error', 'Nomor Kursi sudah terpakai. Harap pilih nomor kursi lain.');
        }

        DB::insert(
            'INSERT INTO penumpang(nama_penumpang, nomor_telepon, alamat_penumpang, id_tiket, nomor_kursi, deleted) VALUES (?, ?, ?, ?, ?, 0)',
            [$namaPenumpang, $nomorTelepon, $alamatPenumpang, $idTiket, $nomorKursi]
        );

        return redirect()->route('admin.index')->with('success', 'Data Penumpang berhasil ditambahkan');
    }


    public function storepassenger(Request $request)
    {
        $request->validate([
            'nama_penumpang' => 'required',
            'nomor_telepon' => 'required',
            'alamat_penumpang' => 'required',
            'nomor_kursi' => 'required',
        ]);

        $namaPenumpang = $request->nama_penumpang;
        $nomorTelepon = $request->nomor_telepon;
        $alamatPenumpang = $request->alamat_penumpang;
        $idTiket = $request->id_tiket;
        $nomorKursi = $request->nomor_kursi;

        // Ensure the number of placeholders matches the number of actual values
        DB::insert(
            'INSERT INTO penumpang(nama_penumpang, nomor_telepon, alamat_penumpang, id_tiket, nomor_kursi, deleted) VALUES (?, ?, ?, ?, ?, 0)',
            [$namaPenumpang, $nomorTelepon, $alamatPenumpang, $idTiket, $nomorKursi]
        );

        return redirect()->route('admin.passenger')->with('success', 'Penumpang Data has been added');
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

        return view('admin.index')->with('datas', $datas);
    }

    public function passenger()
    {
        $datas = DB::select(
            'SELECT * FROM `penumpang` WHERE deleted = 0'
        );

        return view('admin.passenger')->with('datas', $datas);
    }

    public function airline()
    {
        $datas = DB::select(
            'SELECT * FROM `maskapai`'
        );

        return view('admin.airline')->with('datas', $datas);
    }

    public function flight()
    {
        $datas = DB::select(
            'SELECT * FROM `penerbangan`'
        );

        return view('admin.flight')->with('datas', $datas);
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

        return view('admin.trash')->with('datas', $datas);
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

        return view('admin.index')->with('datas', $datas);
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

        return view('admin.trash')->with('datas', $datas);
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

        return view('admin.passenger')->with('datas', $datas);
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

        return view('admin.index')->with('datas', $datas);
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

        return view('admin.trash')->with('datas', $datas);
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

        return view('admin.passenger')->with('datas', $datas);
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

        return view('admin.index')->with('datas', $datas);
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

        return view('admin.passenger')->with('datas', $datas);
    }

    public function searchairline(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT *
            FROM maskapai
            WHERE nama_maskapai LIKE '%$query%'
        ");

        return view('admin.airline')->with('datas', $datas);
    }

    public function searchflight(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT *
            FROM penerbangan
            WHERE id_penerbangan LIKE '%$query%'
        ");

        return view('admin.flight')->with('datas', $datas);
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

        return view('admin.index')->with('datas', $datas);
    }





    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select('
            SELECT p.id_penumpang, p.nama_penumpang, p.nomor_telepon, p.alamat_penumpang, p.nomor_kursi, p.deleted, t.tanggal_pemesanan
            FROM penumpang p
            INNER JOIN tiket t ON p.id_tiket = t.id_tiket
            WHERE p.id_tiket = ?
            AND p.deleted = 0
        ', [$id]);

        if (!empty($data)) {
            $data = $data[0]; // Ambil hanya baris pertama dari hasil query
        } else {
            // Handle jika data tidak ditemukan
            // Contohnya:
            return redirect()->route('admin.index')->with('error', 'Data not found');
        }

        return view('admin.edit')->with('data', $data); // Render the edit view with the fetched data
    }

    public function editpassenger($id)
    {
        $data = DB::select('
            SELECT p.id_penumpang, p.nama_penumpang, p.nomor_telepon, p.alamat_penumpang, p.nomor_kursi
            FROM penumpang p
            WHERE p.id_penumpang = :id
            AND p.deleted = 0
        ', ['id' => $id]);

        if (!empty($data)) {
            $data = $data[0]; // Ambil hanya baris pertama dari hasil query
        } else {
            // Handle jika data tidak ditemukan
            // Contohnya:
            return redirect()->route('admin.index')->with('error', 'Data not found');
        }

        return view('admin.editpassenger')->with('data', $data);
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
        // Periksa apakah nomor kursi sudah terpakai untuk id_tiket yang berbeda
        $existingPassenger = DB::select('SELECT * FROM penumpang WHERE nomor_kursi = :nomor_kursi AND id_penumpang != :id AND id_tiket = :id_tiket', [
            'nomor_kursi' => $request->nomor_kursi,
            'id' => $id,
            'id_tiket' => $request->id_tiket, // Ambil id_tiket dari request
        ]);

        if ($existingPassenger) {
            // Nomor kursi sudah terpakai untuk id_tiket yang berbeda, berikan pesan error atau lakukan tindakan yang sesuai
            return redirect()->back()->with('error', 'Seat number is already taken for a different ticket');
        }

        // Update tabel penumpang
        DB::update(
            'UPDATE penumpang SET nama_penumpang = :nama_penumpang, nomor_telepon = :nomor_telepon, alamat_penumpang = :alamat_penumpang, nomor_kursi = :nomor_kursi WHERE id_penumpang = :id',
            [
                'id' => $id,
                'nama_penumpang' => $request->nama_penumpang,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat_penumpang' => $request->alamat_penumpang,
                'nomor_kursi' => $request->nomor_kursi,
            ]
        );

        // Update tabel tiket
        DB::update(
            'UPDATE tiket SET tanggal_pemesanan = :tanggal_pemesanan WHERE id_tiket = :id_tiket',
            [
                'id_tiket' => $request->id_tiket,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
            ]
        );

        DB::commit(); // Commit transaction jika kedua update berhasil
        return redirect()->route('admin.index')->with('success', 'Passenger data has been changed');
    } catch (\Exception $e) {
        DB::rollback(); // Rollback jika terjadi error
        return redirect()->back()->with('error', 'Failed to update data');
    }

    return redirect()->route('admin.index')->with('success', 'Passenger data has been changed');
}



public function updatepassenger($id, Request $request)
{
    $request->validate([
        'nama_penumpang' => 'required',
        'nomor_telepon' => 'required',
        'alamat_penumpang' => 'required',
        'nomor_kursi' => 'required',
    ]);

    DB::beginTransaction();

    try {
        // Ambil id_tiket dari penumpang yang akan diupdate
        $passenger = DB::select('SELECT id_tiket FROM penumpang WHERE id_penumpang = :id', ['id' => $id]);
        $id_tiket = $passenger[0]->id_tiket ?? null;

        if ($id_tiket) {
            // Periksa apakah nomor kursi sudah terpakai untuk id_tiket yang berbeda
            $existingPassenger = DB::select('SELECT * FROM penumpang WHERE nomor_kursi = :nomor_kursi AND id_penumpang != :id AND id_tiket = :id_tiket', [
                'nomor_kursi' => $request->nomor_kursi,
                'id' => $id,
                'id_tiket' => $id_tiket,
            ]);

            if ($existingPassenger) {
                // Nomor kursi sudah terpakai untuk id_tiket yang berbeda, berikan pesan error atau lakukan tindakan yang sesuai
                return redirect()->back()->with('error', 'Seat number is already taken for a different ticket');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to find ticket information for the passenger');
        }

        // Update tabel penumpang
        DB::update(
            'UPDATE penumpang SET nama_penumpang = :nama_penumpang, nomor_telepon = :nomor_telepon, alamat_penumpang = :alamat_penumpang, nomor_kursi = :nomor_kursi WHERE id_penumpang = :id',
            [
                'id' => $id,
                'nama_penumpang' => $request->nama_penumpang,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat_penumpang' => $request->alamat_penumpang,
                'nomor_kursi' => $request->nomor_kursi,
            ]
        );

        DB::commit(); // Commit transaction jika update berhasil
        return redirect()->route('admin.passenger')->with('success', 'Passenger data has been changed');
    } catch (\Exception $e) {
        DB::rollback(); // Rollback jika terjadi error
        return redirect()->back()->with('error', 'Failed to update data');
    }

    return redirect()->route('admin.passenger')->with('success', 'Passenger data has been changed');
}


    // public function to delete a row from a table

    public function restore($id)
    {
        $sql = "UPDATE penumpang SET deleted = 0 WHERE id_penumpang = :id_penumpang";

        DB::update($sql, ['id_penumpang' => $id]);

        return redirect()->route('admin.trash')->with('success', 'Passenger Data has been restored');
    }


    public function delete($id)
    {
        $sql = "UPDATE penumpang SET deleted = 1 WHERE id_penumpang = :id_penumpang";

        DB::update($sql, ['id_penumpang' => $id]);

        return redirect()->route('admin.index')->with('success', 'Passenger Data has been sent to trash');
    }

    public function deletepassenger($id)
    {
        $sql = "UPDATE penumpang SET deleted = 1 WHERE id_penumpang = :id_penumpang";

        DB::update($sql, ['id_penumpang' => $id]);

        return redirect()->route('admin.passenger')->with('success', 'Passenger Data has been sent to trash');
    }


    public function deletereal($id)
    {
        DB::delete('DELETE FROM penumpang WHERE id_penumpang = :id_penumpang', ['id_penumpang' => $id]);
        return redirect()->route('admin.trash')->with('success', 'Data penumpang berhasil dihapus');
    }
}
