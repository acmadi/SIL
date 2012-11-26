<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infolib {

    //nama_tabel => nama_yang_diinginkan
    function retrieve_label($type = 'use_lahan') {
        $label = null;
        if ($type == 'use_lahan') {
            $label = array(
                'pemukiman' => 'Pemukiman',
                'jasa' => 'Jasa',
                'industri' => 'Industri',
                'tegalan' => 'Tegalan',
                'sawah_irigasi_teknis' => 'Sawah Irigasi Teknis',
                'sawah_tadah_hujan' => 'Sawah Tadah Hujan',
                'kebun_campuran' => 'Kebun Campuran',
                'perkebunan' => 'Perkebunan',
                'hutan' => 'Hutan',
                'perairan' => 'Perairan',
                'tambak' => 'Tambak',
                'tanah_kosong' => 'Tanah Kosong',
                'semak_alang' => 'Semak alang-alang',
                'lain_lain' => 'Lain-Lain'
            );
        }
        if ($type == 'use_hutan') {
            $label = array(
                'cagar_alam' => 'Cagar Alam',
                'suaka_margasatwa' => 'Suaka Margasatwa',
                'taman_wisata' => 'Taman Wisata',
                'taman_buru' => 'Taman Buru',
                'taman_nasional' => 'Taman Nasional',
                'taman_hutan_raya' => 'Taman Hutan Raya',
                'hutan_lindung' => 'Hutan Lindung',
                'hutan_produksi' => 'Hutan Produksi',
                'hutan_produksi_terbatas' => 'Hutan Produksi Terbatas',
                'hutan_kota' => 'Hutan Kota',
                'hutan_tanaman_industri' => 'Hutan Tanaman Industri',
                'lain_lain' => 'Lain Lain'
            );
        }
        if ($type == 'kebutuhan_air_industri') {
            $label = array(
                'kebutuhan_air_industri' => 'Kebutuhan Air Industri',
                'pertanian' => 'Pertanian',
                'kebutuhan_air_niaga' => 'Kebutuhan Air Niaga'
            );
        }
        if ($type == 'lahan_kritis') {
            $label = array(
                'dalam_kawasan_hutan' => 'Dalam Kawasan Hutan',
                'luar_kawasan_hutan' => 'Luar Kawasan Hutan'
            );
        }
        if ($type == 'de2_laki_laki_by_umur') {
            $label = array(
                'usia_0_14' => '0-14',
                'usia_15_19' => '15-19',
                'usia_40_54' => '40-54',
                'usia_55_64' => '55-64',
                'usia_65' => '65+'
            );
        }
        if ($type == 'de3_perempuan_by_umur') {
            $label = array(
                'usia_0_14' => '0-14',
                'usia_15_19' => '15-19',
                'usia_40_54' => '40-54',
                'usia_55_64' => '55-64',
                'usia_65' => '65+'
            );
        }
        if ($type == 'laki_laki_by_pendidikan') {
            $label = array(
                'diploma' => 'Diploma',
                'universitas' => 'Universitas',
                'lain_lain' => 'Lain-lain'
            );
        }
        if ($type == 'perempuan_by_pendidikan') {
            $label = array(
                'diploma' => 'Diploma',
                'universitas' => 'Universitas',
                'lain_lain' => 'Lain-lain'
            );
        }
        if ($type == 'sd8_lhti') {
            $label = array(
                'luas' => 'Luas'
            );
        }
        if ($type == 'volume_pemakaian_air_permukaan') {
            $label = array(
                'pdam' => 'PDAM',
                'industri' => 'Industri',
                'non_pdam' => 'Non PDAM',
                'pertanian' => 'Pertanian',
                'niaga' => 'Niaga'
            );
        }
        if ($type == 'jlpsw') {
            $label = array(
                'jumlah' => 'Jumlah',
                'luas' => 'Luas',
                'potensi' => 'Potensi'
            );
        }
        if ($type == 'jkbt') {
            $label = array(
                'jumlah' => 'Jumlah',
                'baik' => 'Baik',
                'rusak_ringan' => 'Rusak Ringan',
                'rusak_berat' => 'Rusak Berat'
            );
        }
        if ($type == 'jkbb') {
            $label = array(
                'jumlah' => 'Jumlah',
                'baik' => 'Baik',
                'rusak_ringan' => 'Rusak Ringan',
                'rusak_berat' => 'Rusak Berat'
            );
        }

        if ($type == 'test_table') {
            $label = array(
                'kolom_satu' => 'Testing kolom 1',
                'kolom_dua' => 'Testing kolom 2'
            );
        }

        if ($type == 'huebbb') {
            $label = array(
                'jumlah_bme' => 'Jumlah Memenuhi BME',
                'persentase_bme' => 'Persentase Memenuhi BME',
                'jumlah_non_bme' => 'Jumlah Tidak Memenuhi BME',
                'persentase_non_bme' => 'Persentase Tidak Memenuhi BME'
            );
        }
        if ($type == 'huebbs') {
            $label = array(
                'jumlah_bme' => 'Jumlah Memenuhi BME',
                'persentase_bme' => 'Persentase Memenuhi BME',
                'jumlah_non_bme' => 'Jumlah Tidak Memenuhi BME',
                'persentase_non_bme' => 'Persentase Tidak Memenuhi BME'
            );
        }
        if ($type == 'huetmb') {
            $label = array(
                'hc' => 'HC',
                'co_hc' => 'CO & HC',
                'jumlah' => 'Jumlah'
            );
        }
        if ($type == 'lkm') {
            $label = array(
                'luas' => 'Luas',
                'baik' => 'Baik',
                'sedang' => 'Sedang',
                'rusak' => 'Rusak',
                'rehabilitasi' => 'Rehabilitasi',
                'berubah_fungsi' => 'Berubah Fungsi'
            );
        }
        if ($type == 'sd22_chrb') {
            $label = array(
                'jan' => 'Januari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sep' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd23_srb') {
            $label = array(
                'jan' => 'Januari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sep' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }


        if ($type == 'ba3_btlkk') {
            $label = array(
                'korban_meninggal' => 'Korban Meninggal',
                'perkiraan_kerugian' => 'Perkiraan Kerugian'
            );
        }
        if ($type == 'ba5_bagbkk') {
            $label = array(
                'korban_meninggal' => 'Korban Meninggal',
                'perkiraan_kerugian' => 'Perkiraan Kerugian'
            );
        }
        if ($type == 'ba4_bkhlldk') {
            $label = array(
                'luas_terbakar' => 'Perkiraan Luas Terbakar ',
                'perkiraan_kerugian' => 'Perkiraan Kerugian'
            );
        }
        if ($type == 'de1_lwjplp') {
            $label = array(
                'luas' => 'Luas',
                'jumlah_penduduk' => 'Jumlah Penduduk',
                'pertumbuhan_penduduk' => 'Pertumbuhan Penduduk',
                'kepadatan_penduduk' => 'Kepadatan Penduduk'
            );
        }
        if ($type == 'de5_jpp') {
            $label = array(
                'jumlah_desa' => 'Jumlah Desa',
                'jumlah_penduduk' => 'Jumlah Penduduk',
                'jumlah_rt' => 'Jumlah Rumah Tangga'
            );
        }
        if ($type == 'jpldkjsmtp') {
            $label = array(
                'jumlah_penduduk' => 'Jumlah Penduduk',
                'luas' => 'Luas',
                'kepadatan_penduduk' => 'Kepadatan Penduduk',
                'sd' => 'SD',
                'sltp' => 'SLTP',
                'slta' => 'SLTA'
            );
        }
        if ($type == 'se1_jrtm') {
            $label = array(
                'jumlah_rt' => 'Jumlah Rumah Tangga',
                'jumlah_rt_miskin' => 'Jumlah Rumah Tangga Miskin',
                'persentase' => 'Persentase'
            );
        }
        if ($type == 'se3_jrtsam') {
            $label = array(
                'ledeng' => 'Ledeng',
                'sumur' => 'Sumur',
                'pompa' => 'Pompa',
                'kemasan' => 'Kemasan',
                'lainnya' => 'Lainnya',
                'jumlah' => 'Jumlah'
            );
        }
        if ($type == 'sp1_jrtmcps') {
            $label = array(
                'jumlah' => 'Jumlah',
                'angkut' => 'Angkut',
                'timbun' => 'Timbun',
                'bakar' => 'Bakar',
                'sungai' => 'Sungai',
                'lainnya' => 'Lainnya'
            );
        }
        if ($type == 'sp2_jrtmftbab') {
            $label = array(
                'jumlah' => 'Jumlah',
                'sendiri' => 'Sendiri',
                'bersama' => 'Bersama',
                'umum' => 'Umum',
                'tidak_ada' => 'Tidak Ada'
            );
        }
        if ($type == 'sp3_jrtmtbatttst') {
            $label = array(
                'jumlah' => 'Jumlah',
                'persentase' => 'Persentase'
            );
        }
        if ($type == 'sp4_jrtmptsp') {
            $label = array(
                'jumlah_rt' => 'Jumlah Rumah Tangga',
                'timbunan_sampah' => 'Timbunan Sampah'
            );
        }
        if ($type == 'se4_llsmfphpph') {
            $label = array(
                'satu_kali' => 'Satu Kali',
                'dua_kali' => 'Dua Kali',
                'tiga_kali' => 'Tiga Kali',
                'ppp' => 'Produksi Per Hektar',
                'luas_tanam' => 'Luas Tanam'
            );
        }
        if ($type == 'se5_ptpmjt') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar',
                'kacang_tanah' => 'Kacang Tanah'
            );
        }
        if ($type == 'se10_jhtmjt') {
            $label = array(
                'sapi_perah' => 'Sapi Perah',
                'sapi_potong' => 'Sapi Potong',
                'kerbau' => 'Kerbau',
                'kuda' => 'Kuda',
                'kambing' => 'Kambing',
                'domba' => 'Domba',
                'babi' => 'Babi'
            );
        }
        if ($type == 'se11_jhumju') {
            $label = array(
                'ayam_kampung' => 'Ayam Kampung',
                'ayam_petelur' => 'Ayam Petelur',
                'ayam_daging' => 'Ayam Daging',
                'itik' => 'Itik'
            );
        }
        if ($type == 'sp6_pegmdls') {
            $label = array(
                'luas_lahan' => 'Luas Lahan',
                'emisi' => 'Emisi',
            );
        }
        if ($type == 'sp7_pegmdp') {
            $label = array(
                'jumlah_ternak' => 'Jumlah Ternak',
                'jumlah_unggas' => 'Jumlah Unggas',
                'emisi_ternak' => 'Emisi Ternak',
                'emisi_unggas' => 'Emisi Unggas',
                'total' => 'Total'
            );
        }
        if ($type == 'sp8_pegdppu') {
            $label = array(
                'konsumsi' => 'Konsumsi Pupuk Urea',
                'emisi' => 'Emisi CO2'
            );
        }
        if ($type == 'up1_rrkp') {
            $label = array(
                'luas_rcn' => 'Luas (Rencana)',
                'pohon_rcn' => 'Jumlah Pohon (Rencana)',
                'luas_rls' => 'Luas (Realisasi)',
                'pohon_rls' => 'Jumlah Pohon (Realisasi)'
            );
        }
        if ($type == 'up2_rrkb') {
            $label = array(
                'luas_rcn' => 'Luas (Rencana)',
                'pohon_rcn' => 'Jumlah Pohon (Rencana)',
                'luas_rls' => 'Luas (Realisasi)',
                'pohon_rls' => 'Jumlah Pohon (Realisasi)'
            );
        }
        if ($type == 'suttkisi') {
            $label = array(
                'unit_usaha' => 'Unit Usaha',
                'tenaga_kerja' => 'Tenaga Kerja',
                'nilai_produksi' => 'Nilai Produksi'
            );
        }
        if ($type == 'se19_jrtpbbm') {
            $label = array(
                'jumlah_rt' => 'Jumlah Rumah Tangga',
                'lpg' => 'LPG',
                'minyak_tanah' => 'Minyak Tanah',
                'briket' => 'Briket'
            );
        }
        if ($type == 'sd1_lwmplu') {
            $label = array(
                'non_pertanian' => 'Non Pertanian',
                'sawah' => 'Sawah',
                'lahan_kering' => 'Lahan Kering',
                'perkebunan' => 'Perkebunan',
                'hutan' => 'Hutan',
                'lainnya' => 'Lainnya',
                'total' => 'Total'
            );
        }
        if ($type == 'lkhmfs') {
            $label = array(
                'cagar_alam' => 'Cagar Alam',
                'suaka_margasatwa' => 'Suaka Margasatwa ',
                'lahan_kering' => 'Lahan Kering',
                'taman_wisata' => 'Taman Wisata',
                'taman_buru' => 'Taman Buru',
                'taman_nasional' => 'Taman Nasional',
                'taman_hutan_raya' => 'Taman Hutan Raya',
                'hutan_lindung' => 'Hutan Lindung',
                'hutan_produksi' => 'Hutan Produksi',
                'hutan_produksi_terbatas' => 'Hutan Produksi Terbatas',
                'hutan_produksi_konservasi' => 'Hutan Produksi konservasi',
                'hutan_kota' => 'Hutan kota'
            );
        }
        if ($type == 'sd5_llk') {
            $label = array(
                'luas' => 'Luas'
            );
        }
        if ($type == 'sd9__jsfdfydddmghm') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgb') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgr') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmga') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgi') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgk') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgs') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'sd9__jsfdfydddmgt') {
            $label = array(
                'jumlah_spesies_diketahui' => 'Jumlah Spesies Diketahui',
                'jumlah_spesies_dilindungi' => 'Jumlah Spesies Dilidungi'
            );
        }
        if ($type == 'ektdlkaea') {
            $label = array(
                'tebal_tanah' => 'Tebal Tanah',
                'ambang_krisi_erosi' => 'Ambang Kritis Erosi (PP 150/2000)',
                'besaran_erosi' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }if ($type == 'sd19_ltdktk') {
            $label = array(
                'luas_tutupan' => 'Luas Tutupan',
                'sangat_baik' => 'Sangat Baik',
                'baik' => 'Baik',
                'sedang' => 'Sedang',
                'rusak' => 'Rusak'
            );
        }
        if ($type == 'sd20_ldkpl') {
            $label = array(
                'luas' => 'Luas',
                'pak' => 'Persentase Area Kerusakan'
            );
        }
        if ($type == 'ba1_bbkdk') {
            $label = array(
                'total_area_terendam' => 'Total Area Terendam',
                'mengungsi' => 'Korban Mengungsi',
                'meninggal' => 'Korban Meninggal',
                'perkiraan_kerugian' => 'Perkiraan kerugian'
            );
        }
        if ($type == 'ba2_bkldk') {
            $label = array(
                'total_area' => 'Total Area Padi Gagal Panen',
                'perkiraan_kerugian' => 'Perkiraan kerugian'
            );
        }
        if ($type == 'de4_mshmjk') {
            $label = array(
                'ld' => 'Laki-laki (datang)',
                'pd' => 'Perempuan (datang)',
                'lp' => 'Laki-laki (pindah)',
                'pp' => 'Perempuan (pindah)'
            );
        }
        if ($type == 'Sd2__lkhmfs') {
            $label = array(
                'cagar_alam' => 'Cagar Alam',
                'suaka_margasatwa' => 'Suaka Margasatwa',
                'taman_wisata' => 'Taman Wisata',
                'taman_buru' => 'Taman Buru',
                'taman_nasional' => 'Taman Nasioanal',
                'taman_hutan_raya' => 'Taman Hutan Raya',
                'hutan_lindung' => 'Hutan Lindung',
                'hutan_produksi' => 'Hutan Produksi',
                'hutan_produksi_terbatas' => 'Hutan Produksi Terbatas',
                'hutan_produksi_konservasi' => 'Hutan Produksi Konservasi',
                'hutan_kota' => 'Hutan Kota'
            );
        }
        if ($type == 'sd6__plkhmp') {
            $label = array(
                'kebakaran_hutan' => 'Kebakran Hutan',
                'ladang_berpindah' => 'Ladang Berpindah',
                'penabangan_liar' => 'Penebangan Liar',
                'peambahan_hutan' => 'Penebangan Hutan',
                'lainnya' => 'Lainnya'
            );
        }
        if ($type == 'sd7__khmp') {
            $label = array(
                'pemukiman' => 'Pemukiman',
                'pertanian' => 'Pertanian',
                'perkebunan' => 'Perkebunan',
                'industri' => 'Industri',
                'pertambangan' => 'Pertambangan',
                'lainnya' => 'Lainnya'
            );
        }
        if ($type == 'se2_jrtmltt') {
            $label = array(
                'mewah' => 'Mewah',
                'menangah' => 'Menengah',
                'sederhana' => 'Sederhana',
                'kumuh' => 'Kumuh',
                'bantaran_sungai' => 'Bantaran Sungai',
                'pasang_surut' => 'Pasang Surut'
            );
        }
        if ($type == 'se9__lpplp') {
            $label = array(
                'pemukiman' => 'Pemukiman',
                'industri' => 'Industri',
                'tanah_kering' => 'Tanah Kering',
                'perkebunan' => 'Perkebunan',
                'semak_belukar' => 'Semak Belukar',
                'tanah_kosong' => 'Tanah Kosong',
                'perairan_kolam' => 'Perairan/Kolam',
                'lainnya' => 'Lainnya'
            );
        }

        if ($type == 'sd4_lpldkh') {
            $label = array(
                'ksa_kpa' => 'KSA-KPA',
                'hl' => 'HL',
                'hpt' => 'HPT',
                'hp' => 'HP',
                'jumlah_ht' => 'Jumlah (Hutan Tetap)',
                'hpk' => 'HPK',
                'jumlah_kh' => 'Jumlah (Kawasan Hutan)',
                'apl' => 'APL',
                'jumlah' => 'Jumlah'
            );
        }


        if ($type == 'sd4_lpllkh') {
            $label = array(
                'ksa_kpa' => 'KSA-KPA',
                'hl' => 'HL',
                'hpt' => 'HPT',
                'hp' => 'HP',
                'jumlah_ht' => 'Jumlah (Hutan Tetap)',
                'hpk' => 'HPK',
                'jumlah_kh' => 'Jumlah (Kawasan Hutan)',
                'apl' => 'APL',
                'jumlah' => 'Jumlah'
            );
        }
        if ($type == 'sd4_lpl_dtl') {
            $label = array(
                'ksa_kpa' => 'KSA-KPA',
                'hl' => 'HL',
                'hpt' => 'HPT',
                'hp' => 'HP',
                'jumlah_ht' => 'Jumlah (Hutan Tetap)',
                'hpk' => 'HPK',
                'jumlah_kh' => 'Jumlah (Kawasan Hutan)',
                'apl' => 'APL',
                'jumlah' => 'Jumlah'
            );
        }


        if ($type == 'Sd12__idwse') {
            $label = array(
                'nama' => 'Nama Danau/Waduk/Situ/Embung',
                'luas' => 'Panjang',
                'volume' => 'Lebar Permukaan'
            );
        }
        if ($type == 'sd12__idwse') {
            $label = array(
                'lokasi' => 'Lokasi',
                'luas' => 'Luas Lokasi(Ha)',
                'persentase' => 'Persentase Tutupan (%)',
                'kerapatan' => 'Kerapatan (pohon/ha)'
            );
        }

        if ($type == 'se20__pjmk') {
            $label = array(
                'j_nasional' => 'Jalan Nasional',
                'j_proivinsi' => 'Jalan Provinsi',
                'j_kabupaten' => 'Jalan Kabupaten',
                'j_kota' => 'Jalan Kota'
            );
        }
        if ($type == 'up13__aplh') {
            $label = array(
                'apbd' => 'APBD',
                'apbn' => 'APBN',
                'luar_negri' => 'Bantuan Luar Negri',
                'j_kota' => 'Jalan Kota'
            );
        }
        if ($type == 'sd3__lkhlbrtrwdtl_lk') {
            $label = array(
                'kawasan_hutan_lindung' => 'Kawasan Hutan Lindung',
                'kawasan_bergambut' => 'Kawasan Gambut',
                'kawasan_resapan_air' => 'Kawasan Resapan Air',
                'sempadan_pantai' => 'Sempadan Pantai',
                'sempadan_sungai' => 'Sempadan Sungai',
                'kawasan_sekitar_danau_waduk' => 'Kawasan Sekitar Danau/Waduk',
                'ruang_terbuka_hijau' => 'Ruang Terbuka Hijau',
                'kawasan_suaka_alam' => 'Kasawan Suaka Alam',
                'kawasan_suaka_laut' => 'Kawasan Suaka Laut dan Perairan Lainnya',
                'suaka' => 'Suaka Margasatwa dan Suaka Margasatwa Laut',
                'cagar' => 'Cagar Alam dan Cagar Alam Laut',
                'kawasasan_pantai' => 'Kawasan Pantai dan Berhutan Bakau',
                'taman_nasional' => 'Taman Nasional dan Taman Nasional LAut',
                'taman_hutan' => 'Taman Hutan Raya',
                'taman_wisata' => 'Taman Wisata',
                'kawasan_cagar_budaya' => 'Kawasan Cagar Budaya',
                'rawan_tanah_longsor' => 'Kawasan Rawan Tanah Longsor',
                'rawan_gelombang_pasang' => 'Kawasan Rawan Gelombang Pasang',
                'rawan_banjir' => 'Kawasan Rawan Banjir',
                'keunikan_batuan' => 'Kawasan Keunikan Batuan dan Fosil',
                'keunikan_bentang_alam' => 'Kawasan Keunikan dan Keunikan Bentang Alam',
                'keunikan_proses_geologi' => 'Kawasan Keunikan dan Keunikan Proses Geologi',
                'rawan_letusan' => 'Kawasan Rawan Letusan Gunung Berapi',
                'rawan_gempa' => 'Kawasan Rawan Gempa Bumi',
                'rawan_gerakan_tanah' => 'Kawasan Rawan Gerakan Tanah',
                'zona_patah_aktif' => 'Kawasan Rawan Zona Patahan Aktif',
                'rawan_tsunami' => 'Kawasan Rawan Tsunami',
                'rawan_abrasi' => 'Kawasan Rawan Abrasi',
                'rawan_gas_beracun' => 'Kawasan Rawan Gas Beracun',
                'imbuhan_airtanah' => 'Kawasan Imbuhan Air Tanah',
                'imbuhan_mataair' => 'Kawasan Imbuhan Mata Air',
                'cagar_biosfer' => 'Cagar Biosfer',
                'ramsar' => 'Ramsar',
                'taman_buru' => 'Taman Buru',
                'plasma_nutfah' => 'Kawasan Perlindungan Plasma Nutfah',
                'pengungsian_satwa' => 'Kawasan Pengungsian Satwa',
                'terumbu' => 'Jerumbu Karang',
                'koridor' => 'Kawasan Koridor Bagi Jenis Satwa Atau Biota Laut yang Dilindungi'
            );
        }

        if ($type == 'sd3__lkhlbrtrwdtl_v') {
            $label = array(
                'kawasan_hutan_lindung' => 'Kawasan Hutan Lindung',
                'kawasan_bergambut' => 'Kawasan Gambut',
                'kawasan_resapan_air' => 'Kawasan Resapan Air',
                'sempadan_pantai' => 'Sempadan Pantai',
                'sempadan_sungai' => 'Sempadan Sungai',
                'kawasan_sekitar_danau_waduk' => 'Kawasan Sekitar Danau/Waduk',
                'ruang_terbuka_hijau' => 'Ruang Terbuka Hijau',
                'kawasan_suaka_alam' => 'Kasawan Suaka Alam',
                'kawasan_suaka_laut' => 'Kawasan Suaka Laut dan Perairan Lainnya',
                'suaka' => 'Suaka Margasatwa dan Suaka Margasatwa Laut',
                'cagar' => 'Cagar Alam dan Cagar Alam Laut',
                'kawasasan_pantai' => 'Kawasan Pantai dan Berhutan Bakau',
                'taman_nasional' => 'Taman Nasional dan Taman Nasional LAut',
                'taman_hutan' => 'Taman Hutan Raya',
                'taman_wisata' => 'Taman Wisata',
                'kawasan_cagar_budaya' => 'Kawasan Cagar Budaya',
                'rawan_tanah_longsor' => 'Kawasan Rawan Tanah Longsor',
                'rawan_gelombang_pasang' => 'Kawasan Rawan Gelombang Pasang',
                'rawan_banjir' => 'Kawasan Rawan Banjir',
                'keunikan_batuan' => 'Kawasan Keunikan Batuan dan Fosil',
                'keunikan_bentang_alam' => 'Kawasan Keunikan dan Keunikan Bentang Alam',
                'keunikan_proses_geologi' => 'Kawasan Keunikan dan Keunikan Proses Geologi',
                'rawan_letusan' => 'Kawasan Rawan Letusan Gunung Berapi',
                'rawan_gempa' => 'Kawasan Rawan Gempa Bumi',
                'rawan_gerakan_tanah' => 'Kawasan Rawan Gerakan Tanah',
                'zona_patah_aktif' => 'Kawasan Rawan Zona Patahan Aktif',
                'rawan_tsunami' => 'Kawasan Rawan Tsunami',
                'rawan_abrasi' => 'Kawasan Rawan Abrasi',
                'rawan_gas_beracun' => 'Kawasan Rawan Gas Beracun',
                'imbuhan_airtanah' => 'Kawasan Imbuhan Air Tanah',
                'imbuhan_mataair' => 'Kawasan Imbuhan Mata Air',
                'cagar_biosfer' => 'Cagar Biosfer',
                'ramsar' => 'Ramsar',
                'taman_buru' => 'Taman Buru',
                'plasma_nutfah' => 'Kawasan Perlindungan Plasma Nutfah',
                'pengungsian_satwa' => 'Kawasan Pengungsian Satwa',
                'terumbu' => 'Jerumbu Karang',
                'koridor' => 'Kawasan Koridor Bagi Jenis Satwa Atau Biota Laut yang Dilindungi'
            );
        }

        if ($type == 'sd3__lkhlbrtrwdtl_at') {
            $label = array(
                'kawasan_hutan_lindung' => 'Kawasan Hutan Lindung',
                'kawasan_bergambut' => 'Kawasan Gambut',
                'kawasan_resapan_air' => 'Kawasan Resapan Air',
                'sempadan_pantai' => 'Sempadan Pantai',
                'sempadan_sungai' => 'Sempadan Sungai',
                'kawasan_sekitar_danau_waduk' => 'Kawasan Sekitar Danau/Waduk',
                'ruang_terbuka_hijau' => 'Ruang Terbuka Hijau',
                'kawasan_suaka_alam' => 'Kasawan Suaka Alam',
                'kawasan_suaka_laut' => 'Kawasan Suaka Laut dan Perairan Lainnya',
                'suaka' => 'Suaka Margasatwa dan Suaka Margasatwa Laut',
                'cagar' => 'Cagar Alam dan Cagar Alam Laut',
                'kawasasan_pantai' => 'Kawasan Pantai dan Berhutan Bakau',
                'taman_nasional' => 'Taman Nasional dan Taman Nasional LAut',
                'taman_hutan' => 'Taman Hutan Raya',
                'taman_wisata' => 'Taman Wisata',
                'kawasan_cagar_budaya' => 'Kawasan Cagar Budaya',
                'rawan_tanah_longsor' => 'Kawasan Rawan Tanah Longsor',
                'rawan_gelombang_pasang' => 'Kawasan Rawan Gelombang Pasang',
                'rawan_banjir' => 'Kawasan Rawan Banjir',
                'keunikan_batuan' => 'Kawasan Keunikan Batuan dan Fosil',
                'keunikan_bentang_alam' => 'Kawasan Keunikan dan Keunikan Bentang Alam',
                'keunikan_proses_geologi' => 'Kawasan Keunikan dan Keunikan Proses Geologi',
                'rawan_letusan' => 'Kawasan Rawan Letusan Gunung Berapi',
                'rawan_gempa' => 'Kawasan Rawan Gempa Bumi',
                'rawan_gerakan_tanah' => 'Kawasan Rawan Gerakan Tanah',
                'zona_patah_aktif' => 'Kawasan Rawan Zona Patahan Aktif',
                'rawan_tsunami' => 'Kawasan Rawan Tsunami',
                'rawan_abrasi' => 'Kawasan Rawan Abrasi',
                'rawan_gas_beracun' => 'Kawasan Rawan Gas Beracun',
                'imbuhan_airtanah' => 'Kawasan Imbuhan Air Tanah',
                'imbuhan_mataair' => 'Kawasan Imbuhan Mata Air',
                'cagar_biosfer' => 'Cagar Biosfer',
                'ramsar' => 'Ramsar',
                'taman_buru' => 'Taman Buru',
                'plasma_nutfah' => 'Kawasan Perlindungan Plasma Nutfah',
                'pengungsian_satwa' => 'Kawasan Pengungsian Satwa',
                'terumbu' => 'Jerumbu Karang',
                'koridor' => 'Kawasan Koridor Bagi Jenis Satwa Atau Biota Laut yang Dilindungi'
            );
        }


        if ($type == 'sd3__lkhlbrtrwdtl_tt') {
            $label = array(
                'kawasan_hutan_lindung' => 'Kawasan Hutan Lindung',
                'kawasan_bergambut' => 'Kawasan Gambut',
                'kawasan_resapan_air' => 'Kawasan Resapan Air',
                'sempadan_pantai' => 'Sempadan Pantai',
                'sempadan_sungai' => 'Sempadan Sungai',
                'kawasan_sekitar_danau_waduk' => 'Kawasan Sekitar Danau/Waduk',
                'ruang_terbuka_hijau' => 'Ruang Terbuka Hijau',
                'kawasan_suaka_alam' => 'Kasawan Suaka Alam',
                'kawasan_suaka_laut' => 'Kawasan Suaka Laut dan Perairan Lainnya',
                'suaka' => 'Suaka Margasatwa dan Suaka Margasatwa Laut',
                'cagar' => 'Cagar Alam dan Cagar Alam Laut',
                'kawasasan_pantai' => 'Kawasan Pantai dan Berhutan Bakau',
                'taman_nasional' => 'Taman Nasional dan Taman Nasional LAut',
                'taman_hutan' => 'Taman Hutan Raya',
                'taman_wisata' => 'Taman Wisata',
                'kawasan_cagar_budaya' => 'Kawasan Cagar Budaya',
                'rawan_tanah_longsor' => 'Kawasan Rawan Tanah Longsor',
                'rawan_gelombang_pasang' => 'Kawasan Rawan Gelombang Pasang',
                'rawan_banjir' => 'Kawasan Rawan Banjir',
                'keunikan_batuan' => 'Kawasan Keunikan Batuan dan Fosil',
                'keunikan_bentang_alam' => 'Kawasan Keunikan dan Keunikan Bentang Alam',
                'keunikan_proses_geologi' => 'Kawasan Keunikan dan Keunikan Proses Geologi',
                'rawan_letusan' => 'Kawasan Rawan Letusan Gunung Berapi',
                'rawan_gempa' => 'Kawasan Rawan Gempa Bumi',
                'rawan_gerakan_tanah' => 'Kawasan Rawan Gerakan Tanah',
                'zona_patah_aktif' => 'Kawasan Rawan Zona Patahan Aktif',
                'rawan_tsunami' => 'Kawasan Rawan Tsunami',
                'rawan_abrasi' => 'Kawasan Rawan Abrasi',
                'rawan_gas_beracun' => 'Kawasan Rawan Gas Beracun',
                'imbuhan_airtanah' => 'Kawasan Imbuhan Air Tanah',
                'imbuhan_mataair' => 'Kawasan Imbuhan Mata Air',
                'cagar_biosfer' => 'Cagar Biosfer',
                'ramsar' => 'Ramsar',
                'taman_buru' => 'Taman Buru',
                'plasma_nutfah' => 'Kawasan Perlindungan Plasma Nutfah',
                'pengungsian_satwa' => 'Kawasan Pengungsian Satwa',
                'terumbu' => 'Jerumbu Karang',
                'koridor' => 'Kawasan Koridor Bagi Jenis Satwa Atau Biota Laut yang Dilindungi'
            );
        }

        if ($type == 'sd3__lkhlbrtrwdtl_ba') {
            $label = array(
                'kawasan_hutan_lindung' => 'Kawasan Hutan Lindung',
                'kawasan_bergambut' => 'Kawasan Gambut',
                'kawasan_resapan_air' => 'Kawasan Resapan Air',
                'sempadan_pantai' => 'Sempadan Pantai',
                'sempadan_sungai' => 'Sempadan Sungai',
                'kawasan_sekitar_danau_waduk' => 'Kawasan Sekitar Danau/Waduk',
                'ruang_terbuka_hijau' => 'Ruang Terbuka Hijau',
                'kawasan_suaka_alam' => 'Kasawan Suaka Alam',
                'kawasan_suaka_laut' => 'Kawasan Suaka Laut dan Perairan Lainnya',
                'suaka' => 'Suaka Margasatwa dan Suaka Margasatwa Laut',
                'cagar' => 'Cagar Alam dan Cagar Alam Laut',
                'kawasasan_pantai' => 'Kawasan Pantai dan Berhutan Bakau',
                'taman_nasional' => 'Taman Nasional dan Taman Nasional LAut',
                'taman_hutan' => 'Taman Hutan Raya',
                'taman_wisata' => 'Taman Wisata',
                'kawasan_cagar_budaya' => 'Kawasan Cagar Budaya',
                'rawan_tanah_longsor' => 'Kawasan Rawan Tanah Longsor',
                'rawan_gelombang_pasang' => 'Kawasan Rawan Gelombang Pasang',
                'rawan_banjir' => 'Kawasan Rawan Banjir',
                'keunikan_batuan' => 'Kawasan Keunikan Batuan dan Fosil',
                'keunikan_bentang_alam' => 'Kawasan Keunikan dan Keunikan Bentang Alam',
                'keunikan_proses_geologi' => 'Kawasan Keunikan dan Keunikan Proses Geologi',
                'rawan_letusan' => 'Kawasan Rawan Letusan Gunung Berapi',
                'rawan_gempa' => 'Kawasan Rawan Gempa Bumi',
                'rawan_gerakan_tanah' => 'Kawasan Rawan Gerakan Tanah',
                'zona_patah_aktif' => 'Kawasan Rawan Zona Patahan Aktif',
                'rawan_tsunami' => 'Kawasan Rawan Tsunami',
                'rawan_abrasi' => 'Kawasan Rawan Abrasi',
                'rawan_gas_beracun' => 'Kawasan Rawan Gas Beracun',
                'imbuhan_airtanah' => 'Kawasan Imbuhan Air Tanah',
                'imbuhan_mataair' => 'Kawasan Imbuhan Mata Air',
                'cagar_biosfer' => 'Cagar Biosfer',
                'ramsar' => 'Ramsar',
                'taman_buru' => 'Taman Buru',
                'plasma_nutfah' => 'Kawasan Perlindungan Plasma Nutfah',
                'pengungsian_satwa' => 'Kawasan Pengungsian Satwa',
                'terumbu' => 'Jerumbu Karang',
                'koridor' => 'Kawasan Koridor Bagi Jenis Satwa Atau Biota Laut yang Dilindungi'
            );
        }

        if ($type == 'se6__llpb_mjt') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }

        if ($type == 'se6__llpr_mjt') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }

        if ($type == 'se6__ppb_mjt') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }

        if ($type == 'se6__ppr_mjt') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }


        if ($type == 'se7__pputpbjp_u') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }


        if ($type == 'se7__pputpbjp_sp') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }
        if ($type == 'se7__pputpbjp_za') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }
        if ($type == 'se7__pputpbjp_npk') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }
        if ($type == 'se7__pputpbjp_org') {
            $label = array(
                'karet' => 'Karet',
                'kelapa' => 'KeLapa',
                'kelapa_sawit' => 'Kelapa Manis',
                'kopi' => 'Kopi',
                'coklat' => 'Coklat',
                'teh' => 'Teh',
                'cengkeh' => 'Cengkeh',
                'tebu' => 'Tebu',
                'tembakau' => 'Tembakau',
                'kapas' => 'Kapas',
                'jarak' => 'Jarak',
                'kapuk' => 'Kapuk',
                'kina' => 'Kina',
                'jambu_mete' => 'Jambu Mete',
                'pala' => 'Pala',
                'kayu_manis' => 'Kayu manis'
            );
        }
        if ($type == 'se8__pputpdpbjp_u') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'kacang_tanah' => 'Kacang Tanah',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar'
            );
        }
        if ($type == 'se8__pputpdpbjp_sp') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'kacang_tanah' => 'Kacang Tanah',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar'
            );
        }
        if ($type == 'se8__pputpdpbjp_za') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'kacang_tanah' => 'Kacang Tanah',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar'
            );
        }
        if ($type == 'se8__pputpdpbjp_npk') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'kacang_tanah' => 'Kacang Tanah',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar'
            );
        }
        if ($type == 'se8__pputpdpbjp_org') {
            $label = array(
                'padi' => 'Padi',
                'jagung' => 'Jagung',
                'kedelai' => 'Kedelai',
                'kacang_tanah' => 'Kacang Tanah',
                'ubi_kayu' => 'Ubi Kayu',
                'ubi_jalar' => 'Ubi Jalar'
            );
        }
        if ($type == 'se16__jkmjkdbbyd_p') {
            $label = array(
                'beban' => 'Beban',
                'penumpang_pribadi' => 'Penumpang Pribadi',
                'penumpang_umum' => 'Penumpang Umumm',
                'bus_besar_pribadi' => 'Bus_besar Pribadi',
                'bus_besar_umum' => 'Bus Besar Umum',
                'bus_kecil_pribadi' => 'Bus Kecil Pribadi',
                'truk_besar' => 'Truk Besar',
                'truk_kecil' => 'Truk Kecil',
                'roda_tiga' => 'Roda Tiga',
                'roda_dua' => 'Roda Dua'
            );
        }
        if ($type == 'se16__jkmjkdbbyd_s') {
            $label = array(
                'beban' => 'Beban',
                'penumpang_pribadi' => 'Penumpang Pribadi',
                'penumpang_umum' => 'Penumpang Umumm',
                'bus_besar_pribadi' => 'Bus_besar Pribadi',
                'bus_besar_umum' => 'Bus Besar Umum',
                'bus_kecil_pribadi' => 'Bus Kecil Pribadi',
                'truk_besar' => 'Truk Besar',
                'truk_kecil' => 'Truk Kecil',
                'roda_tiga' => 'Roda Tiga',
                'roda_dua' => 'Roda Dua'
            );
        }
        if ($type == 'sp11__peco2dkemsp_ke') {
            $label = array(
                'transportasi' => 'TransPortasi',
                'industri' => 'Industri',
                'rt' => 'Rumah Tangga'
            );
        }
        if ($type == 'sp11__peco2dkemsp_e') {
            $label = array(
                'transportasi' => 'TransPortasi',
                'industri' => 'Industri',
                'rt' => 'Rumah Tangga'
            );
        }
        if ($type == 'sp12__pvlpdst_js') {
            $label = array(
                'angkutan_umum' => 'Terminal Angkutan Umum',
                'sungai' => 'Pelabuhan Sungai dan Danau',
                'laut' => 'Pelabuhan Laut',
                'udara' => 'Pelabuhan Laut'
            );
        }
        if ($type == 'sp12__pvlpdst_vl') {
            $label = array(
                'angkutan_umum' => 'Terminal Angkutan Umum',
                'sungai' => 'Pelabuhan Sungai dan Danau',
                'laut' => 'Pelabuhan Laut',
                'udara' => 'Pelabuhan Laut'
            );
        }
        if ($type == 'up14__jplplhmtp_l') {
            $label = array(
                'doktor' => 'Doktor (S3)',
                'master' => 'Master (S2)',
                'sarjana' => 'SArjana (S1)',
                'diploma' => 'Diploma (D3/D4)',
                'slta' => 'SLTA'
            );
        }
        if ($type == 'up14__jplplhmtp_p') {
            $label = array(
                'doktor' => 'Doktor (S3)',
                'master' => 'Master (S2)',
                'sarjana' => 'SArjana (S1)',
                'diploma' => 'Diploma (D3/D4)',
                'slta' => 'SLTA'
            );
        }
        if ($type == 'sd17__kah_ph') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_dhl') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_so') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_no') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_cr') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_nh') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_na') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_ca') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'sd17__kah_mg') {
            $label = array(
                'jan' => 'Janauari',
                'feb' => 'Februari',
                'mar' => 'Maret',
                'apr' => 'April',
                'mei' => 'Mei',
                'jun' => 'Juni',
                'jul' => 'Juli',
                'agu' => 'Agustus',
                'sept' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember'
            );
        }
        if ($type == 'ds6__pusjalhdjamhmgui_jp') {
            $label = array(
                'u15' => '15-19',
                'u20' => '20-24',
                'u25' => '25-29',
                'u30' => '30-34',
                'u35' => '35-39',
                'u40' => '40-49',
                'u45' => '45-49'
            );
        }
        if ($type == 'ds6__pusjalhdjamhmgui_jalh') {
            $label = array(
                'u15' => '15-19',
                'u20' => '20-24',
                'u25' => '25-29',
                'u30' => '30-34',
                'u35' => '35-39',
                'u40' => '40-49',
                'u45' => '45-49'
            );
        }
        if ($type == 'ds6__pusjalhdjamhmgui_jamh') {
            $label = array(
                'u15' => '15-19',
                'u20' => '20-24',
                'u25' => '25-29',
                'u30' => '30-34',
                'u35' => '35-39',
                'u40' => '40-49',
                'u45' => '45-49'
            );
        }
        if ($type == 'ds7__jkmkudjk_lk') {
            $label = array(
                'u_1' => '<1',
                'u1' => '1-4',
                'u5' => '5-14',
                'u15' => '15-44',
                'u44' => '>44'
            );
        }
        if ($type == 'ds7__jkmkudjk_p') {
            $label = array(
                'u_1' => '<1',
                'u1' => '1-4',
                'u5' => '5-14',
                'u15' => '15-44',
                'u44' => '>44'
            );
        }
        if ($type == 'ds8__jpuydp') {
            $label = array(
                'jenis' => 'Jenis Penyakit',
                'jumlah_penderita' => 'Jumlah Penderita',
                'persentase_penderita' => '% Terhadap Total Penderita'
            );
        }
        if ($type == 'sd5a__ektlkaea_20') {
            $label = array(
                'besaran' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5a__ektlkaea_25') {
            $label = array(
                'besaran' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5a__ektlkaea_50') {
            $label = array(
                'besaran' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5a__ektlkaea_100') {
            $label = array(
                'besaran' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5a__ektlkaea_150') {
            $label = array(
                'besaran' => 'Besaran Erosi',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'Sd5b__ektdlk_ks') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_kp') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_kf_18') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'Sd5b__ektdlk_kf_80') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'Sd5b__ektdlk_bi') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'Sd5b__ektdlk_pt') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_dpa') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_ph') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_dhl') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }


        if ($type == 'Sd5b__ektdlk_r') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'Sd5b__ektdlk_jm') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5c__ektlb_sg') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5c__ektlb_kl') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5c__ektlb_ka') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'sd5c__ektlb_rutb') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'sd5c__ektlb_rug') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5c__ektlb_ph') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }
        if ($type == 'sd5c__ektlb_dhl') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'sd5c__ektlb_jm') {
            $label = array(
                'pengamatan' => 'Hasil Pengamatan',
                'melebihi_tidak' => 'Melebihi/Tidak'
            );
        }

        if ($type == 'se12__jikusmb') {
            $label = array(
                'nama' => 'Nama Industri',
                'jenis' => 'Jenis industri',
                'terpasang' => 'Terpasang ',
                'senyatanya' => 'Senyatanya'
            );
        }


        if ($type == 'se13__jikusk') {
            $label = array(
                'nama' => 'Nama Industri',
                'jenis' => 'Jenis industri',
                'terpasang' => 'Terpasang ',
                'senyatanya' => 'Senyatanya'
            );
        }


        if ($type == 'se14__ludppmjbg') {
            $label = array(
                'nama' => 'Nama Perusahaan',
                'jenis' => 'Jenis Bahan Galian',
                'luas' => 'Luas Areal (Ha) ',
                'produksi' => 'Produksi (Ton/tahun)'
            );
        }

        if ($type == 'se15__laprmjbg') {
            $label = array(
                'jenis' => 'Jenis Bahan Galian',
                'luas' => 'Luas Areal (Ha) ',
                'produksi' => 'Produksi (Ton/tahun)'
            );
        }
        if ($type == 'se17__jspbudrpbbm') {
            $label = array(
                'lokasi' => 'Lokasi',
                'premium' => 'Premium',
                'pertamax' => 'Pertamax',
                'solar' => 'Solar'
            );
        }

        if ($type == 'se18__kbbmusimjbb') {
            $label = array(
                'nama_industri' => 'Nama Industri',
                'lpg' => 'LPG (kg)',
                'minyak_bakar' => 'Minyak Bakar (Liter)',
                'minyak_diesel' => 'Minyak Diesel (Liter)',
                'solar' => 'Solar (Liter)',
                'minyak_tanah' => 'Minyak Tanah (Liter)',
                'gas' => 'Gas (MMSFC)',
                'batubara' => 'Batubara (Ton)',
                'biomasa' => 'Biomasa (Ton)'
            );
        }


        if ($type == 'se21__stkpu') {
            $label = array(
                'nama' => 'Nama Terminal',
                'tipe' => 'Tipe Terminal',
                'lokasi' => 'Lokasi',
                'luas' => 'Luas Kawasan (Ha)'
            );
        }


        if ($type == 'se22__splsd') {
            $label = array(
                'nama' => 'Nama Pelabuhan',
                'jenis' => 'Jenis Kegiatan',
                'peran_fungsi' => 'Peran dan Fungsi',
                'luas' => 'Luas Kawasan (Ha)'
            );
        }

        if ($type == 'se23_spu') {
            $label = array(
                'nama' => 'Nama Pelabuhan Udara',
                'klasifikasi' => 'Klasifikasi',
                'status' => 'Status Pengguna',
                'luas' => 'Luas Kawasan (Ha)'
            );
        }
        if ($type == 'se24__lowjpdlk') {
            $label = array(
                'nama' => 'Nama Obek Wisata',
                'jenis' => 'Jenis Obyek Wisata',
                'jumlah_pengunjung' => 'Jumlah Pengunjung (orang per tahun)',
                'luas' => 'Luas Kawasan (Ha)'
            );
        }
        if ($type == 'se25__shjkth') {
            $label = array(
                'nama' => 'Nama Hotel/Penginapan',
                'kelas' => 'Kelas',
                'jumlah_kamar' => 'Jumlah Kamar',
                'persentase_tingkat_hunian' => 'Persentase Tingkat Hunian'
            );
        }

        if ($type == 'sp5__pvlpdlcdrs') {
            $label = array(
                'nama' => 'Nama Rumah Sakit',
                'kelas' => 'Tipe/Kelas',
                'volume_padat' => 'Volume Limbah Padat',
                'volume_cair' => 'Volume Limbah Cair',
                'volume_b3_padat' => 'Volume B3 Padat',
                'volume_b3_cair' => 'Volume B3 Cair'
            );
        }



        if ($type == 'sp9__pblcdismb') {
            $label = array(
                'jenis' => 'Jenis Industri',
                'bod' => 'BOD',
                'cod' => 'COD',
                'tss' => 'TSS'
            );
        }

        if ($type == 'sp10__pbedisk') {
            $label = array(
                'jenis' => 'Jenis Industri',
                'co2' => 'CO2',
                'no2' => 'NO2',
                'so2' => 'SO2'
            );
        }
        if ($type == 'sp13__pvlpdow') {
            $label = array(
                'nama' => 'Nama Obyek Wisata',
                'luas' => 'Luas (Ha)',
                'volume_limbah' => 'Volume Limbah Padat'
            );
        }
        if ($type == 'sp14__pblcdlpdh') {
            $label = array(
                'nama' => 'Nama Obyek Wisata',
                'kelas' => 'Luas (Ha)',
                'limbah_padat' => 'Volume Limbah Padat',
                'bod' => 'BOD',
                'cot' => 'COT'
            );
        }
        if ($type == 'sp15__iplb3') {
            $label = array(
                'nama' => 'Nama Industri',
                'jenis_kegiatan' => 'Jenis Kegiatan',
                'jenis_limbah' => 'Jenis Limbah',
                'volume' => 'Volume'
            );
        }
        if ($type == 'sp16__pymimlb3') {
            $label = array(
                'nama' => 'Nama Perusahaan',
                'jenis_izin' => 'Jenis Izin',
                'no_izin' => 'No Izin'
            );
        }

        if ($type == 'sp17__pymimlb3') {
            $label = array(
                'nama' => 'Nama Perusahaan',
                'no_izin' => 'No Izin'
            );
        }
        if ($type == 'up3__kfl') {
            $label = array(
                'nama' => 'Nama Kegiatan',
                'lokais' => 'Lokasi Kegiatan',
                'instansi_penanggung_jawab' => 'Instansi Penanggung Jawab'
            );
        }
        if ($type == 'up4__rauklupl') {
            $label = array(
                'jenis_dokumen' => 'Jenis Dokumen',
                'kegiatan' => 'Kegiatan',
                'pemrakarsa' => 'Pemrakarsa'
            );
        }

        if ($type == 'up5__ppuklupl') {
            $label = array(
                'waktu' => 'Waktu (tgl/bln/thn)',
                'nama_perusahaan' => 'Nama Perusahaan',
                'ukl' => 'UKL',
                'upl' => 'UPL'
            );
        }

        if ($type == 'up6__pml') {
            $label = array(
                'masalah' => 'Masalah',
                'jumlah_pengaduan' => 'Jumlah Pengaduan'
            );
        }
        if ($type == 'up7__spm') {
            $label = array(
                'masalah' => 'Masalah',
                'status' => 'Status'
            );
        }

        if ($type == 'up8__jlsm') {
            $label = array(
                'nama' => 'Nama LSM',
                'alamat' => 'Alamat'
            );
        }


        if ($type == 'up9__ppl') {
            $label = array(
                'nama' => 'Nama Orang/Kelompok/Organisasi',
                'nama_penghargaan' => 'Nama Penghargaan',
                'pemberi_penghargaan' => 'Pemberi Penghargaan'
            );
        }
        if ($type == 'up10__kpl') {
            $label = array(
                'nama' => 'Nama Kegiatan',
                'penyelenggara' => 'Instansi Penyelenggara',
                'peserta' => 'Peserta',
                'waktu' => 'Waktu Penyuluhan (Tgl/Bln/Tahun)'
            );
        }

        if ($type == 'up11__kfpklom') {
            $label = array(
                'nama_kegiatan' => 'Nama Kegiatan',
                'lokasi' => 'Lokasi Kegaitan',
                'pelaksana' => 'Pelaksana Kegiatan'
            );
        }
        if ($type == 'up12__phbtrdplh') {
            $label = array(
                'jenis_produk' => 'Jenis Produ',
                'nomor' => 'Nomor',
                'tahun' => 'Tahun',
                'tentang' => 'Tentang'
            );
        }
        if ($type == 'up15__jsfbl') {
            $label = array(
                'nama_instansi' => 'Nama Instansi',
                'nama_jabatan' => 'Nama Jabatan',
                'staf_lai_laki' => 'Staf Laki-laki',
                'staf_perempuan' => 'Staf Perempuan'
            );
        }



        return $label;
    }

    function get_satuan_type($type) {
        $satuan = null;
        if ($type) {
            $s = Doctrine::getTable('jenis_data')->findOneByNama_tabel($type);
            $satuan = $s->satuan;
        }
        return $satuan;
    }

    function get_kategori_type($type) {
        $k = null;
        if ($type) {
            $s = Doctrine::getTable('jenis_data')->findOneByNama_tabel($type);
            $k = $s->kategori;
        }
        return $k;
    }

    function get_nama_type($type) {
        $k = null;
        if ($type) {
            $s = Doctrine::getTable('jenis_data')->findOneByNama_tabel($type);
            $k = $s->nama;
        }
        return $k;
    }

    function retrieve_type() {
        $typelist = Doctrine::getTable('jenis_data')->findAll()->toArray();
        return $typelist;
    }

    function retrieve_detail($datareq, $type = "use_lahan") {
        $detailtext = "<table cellspacing=0>";
        $label_used = $this->retrieve_label($type);
        $sum = 0;
        foreach ($label_used as $key => $val) {
            $detailtext .= "<tr>
                    <th>$val</th>
                    <td>" . $datareq[0][$key] . " " . $this->get_satuan_type($type) . "</td>
                </tr>";
            $sum += floatval($datareq[0][$key]);
        }
        $detailtext .= "<tr>
                    <th>Jumlah</th>
                    <td><b>" . $sum . " " . $this->get_satuan_type($type) . "</b></td>
                </tr>
            </table>";

        return $detailtext;
    }

    function get_years_between($f, $t) {

        $yi1 = intval($f);
        $yi2 = intval($t);

        $temp = 0;
        if ($yi1 > $yi2) {
            $yi2 = $temp;
            $yi2 = $yi1;
            $yi1 = $temp;
        }

        $years = array();
        for ($i = 0; $i <= $yi2 - $yi1; $i++) {
            array_push($years, $yi1 + $i);
        }

        return $years;
    }

    function view_r($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    function add_report($kota_id, $year, $notes = null) {
        $status = -1;
        $d = Doctrine_Query::create()
                ->select('id')
                ->from('report')
                ->where('kota_id = ?', $kota_id)
                ->andwhere('tahun = ?', $year);
        $rowd = $d->execute()->toArray();

        if (count($rowd) == 0) {
            $newr = new Report();
            $newr->tahun = $year;
            $newr->notes = $notes;
            $newr->kota_id = $kota_id;
            $newr->lock_status = 0;
            $newr->save();

            $i = 0;
            $d = array();

            foreach ($this->retrieve_type() as $key => $val) {
                $d[$i] = new $val['nama_tabel']();
                $i++;
            }

            foreach ($d as $tabel) {
                $tabel->kota_id = $kota_id;
                $tabel->data_tahun = $newr->id;
                $tabel->save();
            }

            unset($d);
            $status = $newr->id;
            // echo 'sukses';
        } else {
            // echo 'gagal';
        }
        return $status;
    }

    function delete_report($rid) {
        $status = false;
        if ($u = Doctrine::getTable('report')->find($rid)) {

            foreach ($this->retrieve_type() as $key => $val) {
                if ($d = Doctrine::getTable($val['nama_tabel'])->findOneByData_Tahun($rid)) {
                    // echo 'delete on '.$val['nama_tabel'].'<br>';
                    $d->delete();
                }
            }
            // $u->delete();
            echo $rid . 'deleted<br>';
            $status = true;
        } else {
            // echo 'gagal';
        }

        return $status;
    }

}

?>