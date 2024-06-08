<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bobot;
use App\Models\History; 

class MooraController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        $totalPegawai = $pegawais->count();
        $bobots = Bobot::all()->keyBy('kriteria');
        $hasilNormalisasi = [];

        $ipkValues = $pegawais->pluck('ipk')->toArray();
        $rataRataIpk = array_sum($ipkValues) / count($ipkValues);
        $nilaiTertinggiIpk = max($ipkValues);
        $nilaiTerendahIpk = min($ipkValues);

        $usiaValues = $pegawais->pluck('usia')->toArray();
        $rataRataUsia = array_sum($usiaValues) / count($usiaValues);
        $nilaiTertinggiUsia = max($usiaValues);
        $nilaiTerendahUsia = min($usiaValues);

        $pengalamanValues = $pegawais->pluck('pengalaman_kerja')->map(function($value) {
            if ($value === '5+') {
                return 6;
            } elseif ($value === '-1') {
                return 0.5;
            } else {
                return (int)$value;
            }})->toArray();
        $rataRataPengalaman = array_sum($pengalamanValues) / count($pengalamanValues);
        $nilaiTertinggiPengalaman = max($pengalamanValues);
        $nilaiTerendahPengalaman = min($pengalamanValues);

        $wawancaraValues = $pegawais->pluck('nilai_wawancara')->toArray();
        $rataRataWawancara = array_sum($wawancaraValues) / count($wawancaraValues);
        $nilaiTertinggiWawancara = max($wawancaraValues);
        $nilaiTerendahWawancara = min($wawancaraValues);

        $psikotestValues = $pegawais->pluck('nilai_psikotest')->toArray();
        $rataRataPsikotest = array_sum($psikotestValues) / count($psikotestValues);
        $nilaiTertinggiPsikotest = max($psikotestValues);
        $nilaiTerendahPsikotest = min($psikotestValues);

        $testValues = $pegawais->pluck('nilai_tes_tertulis')->toArray();
        $rataRataTest = array_sum($testValues) / count($testValues);
        $nilaiTertinggiTest = max($testValues);
        $nilaiTerendahTest = min($testValues);

        foreach ($pegawais as $pegawai) {
            $pengalaman_kerja = $pegawai->pengalaman_kerja;
            switch ($pengalaman_kerja) {
                case '-1':
                    $pengalaman_kerja_normal = 0.10;
                    break;
                case '1':
                    $pengalaman_kerja_normal = 0.15;
                    break;
                case '2':
                    $pengalaman_kerja_normal = 0.25;
                    break;
                case '3':
                    $pengalaman_kerja_normal = 0.40;
                    break;
                case '4':
                    $pengalaman_kerja_normal = 0.60;
                    break;
                case '5':
                    $pengalaman_kerja_normal = 0.85;
                    break;
                case '5+':
                    $pengalaman_kerja_normal = 1;
                    break;
                default:
                    $pengalaman_kerja_normal = 0;
                    break;
            }

            $ipk = $pegawai->ipk;
            $normalisasi_ipk = $ipk / 4;
            $usia = $pegawai->usia;
            $normalisasi_usia = ($usia >= 18 && $usia <= 28) ? 1 : 0.90;
            $normalisasi_psikotest = $pegawai->nilai_psikotest / 100;
            $normalisasi_test_tertulis = $pegawai->nilai_tes_tertulis / 100;
            $normalisasi_wawancara = $pegawai->nilai_wawancara / 100;

            $hasil_ipk = $normalisasi_ipk * $bobots['C1']->bobot;
            $hasil_usia = $normalisasi_usia * $bobots['C2']->bobot;
            $hasil_pengalaman = $pengalaman_kerja_normal * $bobots['C3']->bobot;
            $hasil_wawancara = $normalisasi_wawancara * $bobots['C4']->bobot;
            $hasil_psikotest = $normalisasi_psikotest * $bobots['C5']->bobot;
            $hasil_test = $normalisasi_test_tertulis * $bobots['C6']->bobot;

            $hasil_akhir = $hasil_ipk + $hasil_usia + $hasil_pengalaman + $hasil_wawancara + $hasil_psikotest + $hasil_test;

            $hasilNormalisasi[] = [
                'pegawai' => $pegawai,
                'pengalaman_kerja_normal' => $pengalaman_kerja_normal,
                'normalisasi_ipk' => $normalisasi_ipk,
                'normalisasi_usia' => $normalisasi_usia,
                'normalisasi_psikotest' => $normalisasi_psikotest,
                'normalisasi_test_tertulis' => $normalisasi_test_tertulis,
                'normalisasi_wawancara' => $normalisasi_wawancara,
                'hasil_ipk' => $hasil_ipk,
                'hasil_usia' => $hasil_usia,
                'hasil_pengalaman' => $hasil_pengalaman,
                'hasil_wawancara' => $hasil_wawancara,
                'hasil_psikotest' => $hasil_psikotest,
                'hasil_test' => $hasil_test,
                'hasil_akhir' => $hasil_akhir,
            ];
        }

        $top3 = collect($hasilNormalisasi)->sortByDesc('hasil_akhir')->values()->all();

        return view('livewire.pages.moora.index', [
            'hasilNormalisasi' => $hasilNormalisasi,
            'bobots' => $bobots,
            'pegawais' => $pegawais,
            'totalPegawai' => $totalPegawai,

            'rataRataIpk' => $rataRataIpk,
            'nilaiTertinggiIpk' => $nilaiTertinggiIpk,
            'nilaiTerendahIpk' => $nilaiTerendahIpk,
            'ipkValues' => $ipkValues,

            'rataRataUsia' => $rataRataUsia,
            'nilaiTertinggiUsia' => $nilaiTertinggiUsia,
            'nilaiTerendahUsia' => $nilaiTerendahUsia,
            'usiaValues' => $usiaValues,

            'rataRataPengalaman' => $rataRataPengalaman,
            'nilaiTertinggiPengalaman' => $nilaiTertinggiPengalaman,
            'nilaiTerendahPengalaman' => $nilaiTerendahPengalaman,
            'pengalamanValues' => $pengalamanValues,

            'rataRataWawancara' => $rataRataWawancara,
            'nilaiTertinggiWawancara' => $nilaiTertinggiWawancara,
            'nilaiTerendahWawancara' => $nilaiTerendahWawancara,
            'wawancaraValues' => $wawancaraValues,

            'rataRataPsikotest' => $rataRataPsikotest,
            'nilaiTertinggiPsikotest' => $nilaiTertinggiPsikotest,
            'nilaiTerendahPsikotest' => $nilaiTerendahPsikotest,
            'psikotestValues' => $psikotestValues,

            'rataRataTest' => $rataRataTest,
            'nilaiTertinggiTest' => $nilaiTertinggiTest,
            'nilaiTerendahTest' => $nilaiTerendahTest,
            'testValues' => $testValues,

            'top3' => $top3
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);
    
        $pegawais = Pegawai::all();
        $bobots = Bobot::all()->keyBy('kriteria');
    
        $hasilNormalisasi = [];
    
        foreach ($pegawais as $pegawai) {
            $pengalaman_kerja = $pegawai->pengalaman_kerja;
            switch ($pengalaman_kerja) {
                case '-1':
                    $pengalaman_kerja_normal = 0.10;
                    break;
                case '1':
                    $pengalaman_kerja_normal = 0.15;
                    break;
                case '2':
                    $pengalaman_kerja_normal = 0.25;
                    break;
                case '3':
                    $pengalaman_kerja_normal = 0.40;
                    break;
                case '4':
                    $pengalaman_kerja_normal = 0.60;
                    break;
                case '5':
                    $pengalaman_kerja_normal = 0.85;
                    break;
                case '5+':
                    $pengalaman_kerja_normal = 1;
                    break;
                default:
                    $pengalaman_kerja_normal = 0;
                    break;
            }

            $ipk = $pegawai->ipk;
            $normalisasi_ipk = $ipk / 4;
            $usia = $pegawai->usia;
            $normalisasi_usia = ($usia >= 18 && $usia <= 28) ? 1 : 0.90;
            $normalisasi_psikotest = $pegawai->nilai_psikotest / 100;
            $normalisasi_test_tertulis = $pegawai->nilai_tes_tertulis / 100;
            $normalisasi_wawancara = $pegawai->nilai_wawancara / 100;

            $hasil_ipk = $normalisasi_ipk * $bobots['C1']->bobot;
            $hasil_usia = $normalisasi_usia * $bobots['C2']->bobot;
            $hasil_pengalaman = $pengalaman_kerja_normal * $bobots['C3']->bobot;
            $hasil_wawancara = $normalisasi_wawancara * $bobots['C4']->bobot;
            $hasil_psikotest = $normalisasi_psikotest * $bobots['C5']->bobot;
            $hasil_test = $normalisasi_test_tertulis * $bobots['C6']->bobot;
    
            $hasil_akhir = $hasil_ipk + $hasil_usia + $hasil_pengalaman + $hasil_wawancara + $hasil_psikotest + $hasil_test;
    
            $hasilNormalisasi[] = [
                'pegawai' => $pegawai,
                'hasil_akhir' => $hasil_akhir,
            ];
        }

        History::create([
            'judul' => $request->judul,
            'data' => json_encode([
                'hasilNormalisasi' => $hasilNormalisasi,
            ]),
        ]);

        Pegawai::truncate();
    
        return redirect()->route('history.index')->with('success', 'Data berhasil disimpan!');
    }

    public function history()
    {
        $history = History::latest()->get();
        return view('livewire.pages.history.history', compact('history'));
    }

    public function showHistory($id)
    {
        $history = History::findOrFail($id);
        return view('livewire.pages.history.history-detail', compact('history'));
    }
}