<?php
date_default_timezone_set('Asia/Jakarta'); // Set timezone to WIB

// Define academic activities with their start and end dates
$academic_activities = [
    // Ganjil Semester Activities (2025-2026)
    [
        'name' => 'Registrasi Keuangan',
        'start_date' => '2025-08-01',
        'end_date' => '2025-09-05',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Pengisian KRS dan Perwalian',
        'start_date' => '2025-08-01',
        'end_date' => '2025-09-05',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Registrasi Keuangan Tingkat 1',
        'start_date' => '2025-08-01',
        'end_date' => '2025-10-03',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Pengisian KRS dan Perwalian Tingkat 1',
        'start_date' => '2025-08-01',
        'end_date' => '2025-10-03',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Perkuliahan Semester Ganjil',
        'start_date' => '2025-09-08',
        'end_date' => '2025-12-26',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Perkuliahan Semester Ganjil Tk.2 D3-Kebidanan',
        'start_date' => '2025-09-15',
        'end_date' => '2025-12-26',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'Program PKKMB',
        'start_date' => '2025-10-06',
        'end_date' => '2025-10-07',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi' // Assuming this is for all new students
    ],
    [
        'name' => 'Perkuliahan Semester Ganjil Tingkat 1 (Reg/RPL)',
        'start_date' => '2025-10-13',
        'end_date' => '2026-01-17',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UTS',
        'start_date' => '2025-10-17',
        'end_date' => '2025-10-17',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan Soal UTS',
        'start_date' => '2025-10-20',
        'end_date' => '2025-10-20',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Tengah Semester (UTS)',
        'start_date' => '2025-10-27',
        'end_date' => '2025-10-31',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UTS Susulan',
        'start_date' => '2025-11-03',
        'end_date' => '2025-11-07',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Checkpoint I PDDIKTI (Rencana Studi)',
        'start_date' => '2025-11-01',
        'end_date' => '2025-11-30',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan Soal UTS TK 1',
        'start_date' => '2025-11-24',
        'end_date' => '2025-11-24',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UTS TK 1',
        'start_date' => '2025-11-14',
        'end_date' => '2025-11-14',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Tengah Semester (UTS) TK 1',
        'start_date' => '2025-12-01',
        'end_date' => '2025-12-05',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UTS Susulan TK 1',
        'start_date' => '2025-12-08',
        'end_date' => '2025-12-12',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UAS',
        'start_date' => '2025-12-26',
        'end_date' => '2025-12-26',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan soal UAS',
        'start_date' => '2025-12-22',
        'end_date' => '2025-12-22',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Akhir Semester (UAS)',
        'start_date' => '2026-01-05',
        'end_date' => '2026-01-09',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UAS Susulan',
        'start_date' => '2026-01-12',
        'end_date' => '2026-01-15',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UAS TK 1',
        'start_date' => '2025-12-26',
        'end_date' => '2025-12-26',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penginputan Nilai',
        'start_date' => '2026-01-23',
        'end_date' => '2026-01-23',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Remidial',
        'start_date' => '2026-02-02',
        'end_date' => '2026-02-06',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan soal UAS TK 1',
        'start_date' => '2026-01-26',
        'end_date' => '2026-01-26',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Akhir Semester (UAS) TK 1',
        'start_date' => '2026-02-02',
        'end_date' => '2026-02-06',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UAS Susulan TK.1',
        'start_date' => '2026-02-09',
        'end_date' => '2026-02-13',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Penyerahan Nilai Remidial',
        'start_date' => '2026-02-13',
        'end_date' => '2026-02-13',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penginputan Nilai TK 1',
        'start_date' => '2026-02-20',
        'end_date' => '2026-02-20',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Remidial tingkat 1',
        'start_date' => '2026-02-23',
        'end_date' => '2026-02-27',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Penyerahan Nilai Remidial tk 1',
        'start_date' => '2026-03-04',
        'end_date' => '2026-03-04',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penginputan Nilai Akhir Semeter Ganjil 2025-1',
        'start_date' => '2026-03-05',
        'end_date' => '2026-03-05',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Checkpoint II (Hasil Studi)',
        'start_date' => '2026-03-01', // General March date
        'end_date' => '2026-03-31', // General March date
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Penutupan Periode PDDIKTI 2025-1',
        'start_date' => '2026-03-31',
        'end_date' => '2026-03-31',
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Monitoring dan Evaluasi Pasca AMI',
        'start_date' => '2026-04-01', // General April date
        'end_date' => '2026-04-30', // General April date
        'semester' => 'Ganjil',
        'prodi' => 'Semua Prodi'
    ],

    // Genap Semester Activities (2025-2026)
    [
        'name' => 'Registrasi Keuangan',
        'start_date' => '2026-02-02',
        'end_date' => '2026-02-27',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Pengisian KRS dan Perwalian',
        'start_date' => '2026-02-16',
        'end_date' => '2026-03-13',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Perkuliahan Semester Genap',
        'start_date' => '2026-03-09',
        'end_date' => '2026-06-27',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UTS',
        'start_date' => '2026-04-17',
        'end_date' => '2026-04-17',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan Soal UTS',
        'start_date' => '2026-04-20',
        'end_date' => '2026-04-20',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Tengah Semester (UTS)',
        'start_date' => '2026-05-11',
        'end_date' => '2026-05-18',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UTS Susulan',
        'start_date' => '2026-05-21',
        'end_date' => '2026-05-26',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Checkpoint I PDDIKTI (Rencana Studi)',
        'start_date' => '2026-05-01', // General May date
        'end_date' => '2026-05-31', // General May date
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Akhir Pembayaran UAS',
        'start_date' => '2026-06-26',
        'end_date' => '2026-06-26',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan Soal UAS',
        'start_date' => '2026-06-30',
        'end_date' => '2026-06-30',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Ujian Akhir Semester (UAS)',
        'start_date' => '2026-07-13',
        'end_date' => '2026-07-17',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'UAS Susulan',
        'start_date' => '2026-07-20',
        'end_date' => '2026-07-24',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penyerahan Nilai',
        'start_date' => '2026-07-31',
        'end_date' => '2026-07-31',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Remidial',
        'start_date' => '2026-08-03',
        'end_date' => '2026-08-06',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Penyerahan Nilai Remedial',
        'start_date' => '2026-08-10',
        'end_date' => '2026-08-10',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Batas Penginputan Nilai Akhir Semeter Genap 2025-2',
        'start_date' => '2026-08-14',
        'end_date' => '2026-08-14',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Yudisium Akhir Prodi D III Kebidanan',
        'start_date' => '2026-08-24',
        'end_date' => '2026-08-24',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'Yudisium Akhir Prodi Profesi Kebidanan',
        'start_date' => '2026-08-24',
        'end_date' => '2026-08-24',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Yudisium Akhir Prodi S1 Kesmas',
        'start_date' => '2026-08-24',
        'end_date' => '2026-08-24',
        'semester' => 'Genap',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],
    [
        'name' => 'Kegiatan Semester Antara',
        'start_date' => '2026-08-03',
        'end_date' => '2026-08-03',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Audit Mutu Internal SPMI',
        'start_date' => '2026-09-01', // General September date
        'end_date' => '2026-09-30', // General September date
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Checkpoint II (Hasil Studi)',
        'start_date' => '2026-09-01', // General September date
        'end_date' => '2026-09-30', // General September date
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Penutupan Periode PDDIKTI 2025-2',
        'start_date' => '2026-09-30',
        'end_date' => '2026-09-30',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Wisuda',
        'start_date' => '2026-10-09',
        'end_date' => '2026-10-09',
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],
    [
        'name' => 'Pelaporan SPMI Kemdikbud',
        'start_date' => '2026-10-01', // General October date
        'end_date' => '2026-10-31', // General October date
        'semester' => 'Genap',
        'prodi' => 'Semua Prodi'
    ],

    // D3 Kebidanan Semester Ganjil Specific Activities
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium KDPK',
        'start_date' => '2026-02-18',
        'end_date' => '2026-02-18',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Ulang (KDPK)',
        'start_date' => '2026-02-23',
        'end_date' => '2026-02-23',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium Persalinan',
        'start_date' => '2026-01-19',
        'end_date' => '2026-01-19',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium Pasca Persalinan',
        'start_date' => '2026-01-21',
        'end_date' => '2026-01-21',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium Neonatus',
        'start_date' => '2026-01-23',
        'end_date' => '2026-01-23',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium KIP-K',
        'start_date' => '2026-01-26',
        'end_date' => '2026-01-26',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Ulang (Persalinan, dll)',
        'start_date' => '2026-01-30',
        'end_date' => '2026-02-06',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: PKK I',
        'start_date' => '2025-10-13',
        'end_date' => '2025-11-29',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: PKK II',
        'start_date' => '2025-11-29',
        'end_date' => '2026-02-14',
        'semester' => 'Ganjil',
        'prodi' => 'D3 Kebidanan'
    ],

    // S1 Kesehatan Masyarakat Semester Ganjil Specific Activities
    [
        'name' => 'S1 Kesmas: PKM I',
        'start_date' => '2026-02-16',
        'end_date' => '2026-02-17',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],
    [
        'name' => 'S1 Kesmas: PKM II',
        'start_date' => '2026-02-23',
        'end_date' => '2026-02-24',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],
    [
        'name' => 'S1 Kesmas: PBLT 3',
        'start_date' => '2026-02-12',
        'end_date' => '2026-03-05',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],

    // S1 Kebidanan Semester Ganjil Specific Activities
    [
        'name' => 'S1 Kebidanan: Praktikum MK Anatomi Fisilogi',
        'start_date' => '2026-01-12',
        'end_date' => '2026-01-16',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Uji Lab KDPK',
        'start_date' => '2026-01-12',
        'end_date' => '2026-01-23',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Observasi Lapangan MK KDPK dan Pemeriksaan Fisik Ibu dan Bayi',
        'start_date' => '2026-01-26',
        'end_date' => '2026-02-07',
        'semester' => 'Ganjil',
        'prodi' => 'S1 Kebidanan'
    ],

    // S1 Profesi Kebidanan Semester Ganjil Specific Activities
    [
        'name' => 'Profesi Kebidanan: Matrikulasi',
        'start_date' => '2025-10-03',
        'end_date' => '2025-10-03',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Orientasi Praktik dan Persiapan',
        'start_date' => '2025-10-06',
        'end_date' => '2025-10-10',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktek Stase Keterampilan Dasar Praktik Kebidanan',
        'start_date' => '2025-10-27',
        'end_date' => '2025-11-01',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Pranikah dan Prakonsepsi',
        'start_date' => '2025-11-12',
        'end_date' => '2025-11-14',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Kehamilan',
        'start_date' => '2025-12-14',
        'end_date' => '2025-12-17',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Manajemen Pelayanan Kebidanan',
        'start_date' => '2026-01-08',
        'end_date' => '2026-01-12',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Pada Remaja dan Perimenopause',
        'start_date' => '2026-01-29',
        'end_date' => '2026-02-04',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Pemberdayaan Masyarakat dalam Pengelolaan KIA',
        'start_date' => '2026-02-25',
        'end_date' => '2026-02-27',
        'semester' => 'Ganjil',
        'prodi' => 'Profesi Kebidanan'
    ],

    // D3 Kebidanan Semester Genap Specific Activities
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium Asuhan Kebidanan Ibu Hamil',
        'start_date' => '2026-07-27',
        'end_date' => '2026-07-27',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Ulang (Asuhan Kebidanan Ibu Hamil)',
        'start_date' => '2026-07-31',
        'end_date' => '2026-07-31',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Keterampilan Klinik Praktik Kebidanan (KKPK)',
        'start_date' => '2026-08-03',
        'end_date' => '2026-08-28',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium KB',
        'start_date' => '2026-08-03',
        'end_date' => '2026-08-03',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Laboratorium Gawat Darurat',
        'start_date' => '2026-08-05',
        'end_date' => '2026-08-05',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Ulang (KB, Gawat Darurat)',
        'start_date' => '2026-08-10',
        'end_date' => '2026-08-14',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Praktik Klinik (PK) III',
        'start_date' => '2026-02-23',
        'end_date' => '2026-04-28',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Penggantian Praktik dan Seminar',
        'start_date' => '2026-04-29',
        'end_date' => '2026-05-01',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: PKKM',
        'start_date' => '2026-05-04',
        'end_date' => '2026-06-02',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Pengambilan Kasus LTA',
        'start_date' => '2025-11-29',
        'end_date' => '2026-02-14',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Penyusunan Laporan LTA',
        'start_date' => '2026-05-04',
        'end_date' => '2026-06-02',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Sidang Pra LTA',
        'start_date' => '2025-11-29',
        'end_date' => '2026-02-14',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Sidang LTA',
        'start_date' => '2026-06-08',
        'end_date' => '2026-06-12',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Tulis',
        'start_date' => '2026-06-22',
        'end_date' => '2026-06-22',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Uji Praktik (OSCE)',
        'start_date' => '2026-06-29',
        'end_date' => '2026-07-03',
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: UAP',
        'start_date' => '2026-05-01', // General May date
        'end_date' => '2026-07-31', // General July date
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],
    [
        'name' => 'D3 Kebidanan: Pelaksanaan Uji Kompetensi',
        'start_date' => '2026-07-01', // General July date
        'end_date' => '2026-08-31', // General August date
        'semester' => 'Genap',
        'prodi' => 'D3 Kebidanan'
    ],

    // S1 Kesehatan Masyarakat Semester Genap Specific Activities
    [
        'name' => 'S1 Kesmas: PKM III',
        'start_date' => '2026-07-27',
        'end_date' => '2026-07-28',
        'semester' => 'Genap',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],
    [
        'name' => 'S1 Kesmas: MBKM',
        'start_date' => '2026-03-09',
        'end_date' => '2026-07-17',
        'semester' => 'Genap',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],
    [
        'name' => 'S1 Kesmas: Skripsi',
        'start_date' => '2026-03-09',
        'end_date' => '2026-07-17',
        'semester' => 'Genap',
        'prodi' => 'S1 Kesehatan Masyarakat'
    ],

    // S1 Kebidanan Semester Genap Specific Activities
    [
        'name' => 'S1 Kebidanan: Praktikum MK Mikrobiologi dan Parasitologi',
        'start_date' => '2026-05-04',
        'end_date' => '2026-05-08',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Praktikum MK Fisika Kesehatan dan Biokimia Dalam Praktik Kebidanan',
        'start_date' => '2026-05-04',
        'end_date' => '2026-05-08',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Praktiukum MK Farmakologi Dalam Asuhan Kebidanan',
        'start_date' => '2026-07-06',
        'end_date' => '2026-07-10',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Uji Lab KB dan Pelayanan Kontrasepsi',
        'start_date' => '2026-07-06',
        'end_date' => '2026-07-11',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Uji Lab Asuhan kebidanan pada Pra nikah dan Pra konsepsi',
        'start_date' => '2026-07-20',
        'end_date' => '2026-07-25',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],
    [
        'name' => 'S1 Kebidanan: Observasi Lapangan (Asuhan kebidanan pada Pra nikah dan Pra konsepsi serta KB dan Pelayanan Kontrasepsi)',
        'start_date' => '2026-07-27',
        'end_date' => '2026-08-08',
        'semester' => 'Genap',
        'prodi' => 'S1 Kebidanan'
    ],

    // S1 Profesi Kebidanan Semester Genap Specific Activities
    [
        'name' => 'Profesi Kebidanan: Pengambilan Kasus Continuity Of Care (COC) dan konsultasi laporan',
        'start_date' => '2026-03-09',
        'end_date' => '2026-05-02',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Persalinan',
        'start_date' => '2026-04-13',
        'end_date' => '2026-04-16',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada BBL',
        'start_date' => '2026-04-21',
        'end_date' => '2026-04-26',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Nifas',
        'start_date' => '2026-05-10',
        'end_date' => '2026-05-12',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Balita, anak prasekolah',
        'start_date' => '2026-05-22',
        'end_date' => '2026-05-25',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Praktik Stase Asuhan Kebidanan Pada Komunitas',
        'start_date' => '2026-06-17',
        'end_date' => '2026-06-20',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Ujian Akhir Continuity Of Care (COC)',
        'start_date' => '2026-06-22',
        'end_date' => '2026-06-27',
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
    [
        'name' => 'Profesi Kebidanan: Uji Kompetensi Nasional',
        'start_date' => '2026-07-01', // General July 2025 date, assuming this is a typo and refers to 2026
        'end_date' => '2026-07-31', // General July 2025 date
        'semester' => 'Genap',
        'prodi' => 'Profesi Kebidanan'
    ],
];

// Extract unique prodi values for the filter, including 'Semua Prodi'
$prodi_options = ['Semua Prodi'];
foreach ($academic_activities as $activity) {
    if (isset($activity['prodi']) && !in_array($activity['prodi'], $prodi_options)) {
        $prodi_options[] = $activity['prodi'];
    }
}
sort($prodi_options); // Sort alphabetically

// Function to format dates
function formatDate($dateString) {
    // Check if the date string is valid before formatting
    if (strtotime($dateString) === false) {
        return 'Tanggal Tidak Valid';
    }
    return date('d M Y', strtotime($dateString));
}

// Function to filter activities
function filterActivities($activities, $filter_type, $semester_filter = null, $prodi_filter = null, $custom_date = null) {
    $today = new DateTime('today'); // Ensure it's just today's date without time
    $filtered = [];

    foreach ($activities as $activity) {
        $start_date = new DateTime($activity['start_date']);
        $end_date = new DateTime($activity['end_date']);

        $match_time_filter = false;
        $match_semester_filter = true; // Assume true if not filtering by semester
        $match_prodi_filter = true;     // Assume true if not filtering by prodi

        // Determine time filter match
        if ($filter_type === 'custom_date' && !empty($custom_date)) { // Check if custom_date is not empty
            $selected_date = new DateTime($custom_date);
            if ($selected_date->setTime(0,0,0) >= $start_date->setTime(0,0,0) && $selected_date->setTime(0,0,0) <= $end_date->setTime(23,59,59)) {
                $match_time_filter = true;
            }
        } else {
            switch ($filter_type) {
                case 'current':
                    if ($today >= $start_date->setTime(0,0,0) && $today <= $end_date->setTime(23,59,59)) {
                        $match_time_filter = true;
                    }
                    break;
                case '1_month':
                    $one_month_from_now = (clone $today)->modify('+1 month')->setTime(23,59,59);
                    if (($start_date->setTime(0,0,0) >= $today && $start_date->setTime(0,0,0) <= $one_month_from_now) ||
                        ($end_date->setTime(23,59,59) >= $today && $end_date->setTime(23,59,59) <= $one_month_from_now) ||
                        ($start_date->setTime(0,0,0) <= $today && $end_date->setTime(23,59,59) >= $one_month_from_now)) {
                        $match_time_filter = true;
                    }
                    break;
                case '3_months':
                    $three_months_from_now = (clone $today)->modify('+3 months')->setTime(23,59,59);
                    if (($start_date->setTime(0,0,0) >= $today && $start_date->setTime(0,0,0) <= $three_months_from_now) ||
                        ($end_date->setTime(23,59,59) >= $today && $end_date->setTime(23,59,59) <= $three_months_from_now) ||
                        ($start_date->setTime(0,0,0) <= $today && $end_date->setTime(23,59,59) >= $three_months_from_now)) {
                        $match_time_filter = true;
                    }
                    break;
                case 'all':
                    $match_time_filter = true;
                    break;
                default: // Fallback for any unexpected filter type
                    $match_time_filter = false;
                    break;
            }
        }

        // Apply semester filter
        // Semester and prodi filters are only applied if the time filter is 'all'
        // If not 'all', they are effectively ignored by setting match_semester_filter/match_prodi_filter to true
        if ($filter_type !== 'all') {
            $match_semester_filter = true;
            $match_prodi_filter = true;
        } else {
            if ($semester_filter && $semester_filter !== 'Semua Semester') {
                $match_semester_filter = ($activity['semester'] === $semester_filter);
            }
            if ($prodi_filter && $prodi_filter !== 'Semua Prodi') {
                $match_prodi_filter = (isset($activity['prodi']) && $activity['prodi'] === $prodi_filter);
            }
        }
        
        // Only add activity if all active filters match
        if ($match_time_filter && $match_semester_filter && $match_prodi_filter) {
            $filtered[] = $activity;
        }
    }
    // Sort filtered activities by start date
    usort($filtered, function($a, $b) {
        return strtotime($a['start_date']) - strtotime($b['start_date']);
    });
    return $filtered;
}

// Get current filter parameters
$filter = $_GET['filter'] ?? 'current'; // Default filter is 'current'
$semester_filter = $_GET['semester'] ?? 'Semua Semester';
$prodi_filter = $_GET['prodi'] ?? 'Semua Prodi';
$custom_date = $_GET['custom_date'] ?? date('Y-m-d'); // Default custom date to today

// If a custom_date is set via the input, ensure 'filter' is 'custom_date'
if (isset($_GET['custom_date']) && $_GET['custom_date'] != '') {
    $filter = 'custom_date';
} else {
    // If custom_date is cleared/not set, ensure the 'filter' param is not 'custom_date'
    if ($filter === 'custom_date') {
        $filter = 'current'; // Default to 'current' if custom_date is cleared
    }
}


$display_activities = filterActivities($academic_activities, $filter, $semester_filter, $prodi_filter, $custom_date);

$page_title = "Kalender Akademik STIKes Respati";

// Construct page title based on active filters for SEO and clarity
$title_parts = ["Kalender Akademik STIKes Respati"];
if ($filter === 'custom_date' && !empty($custom_date)) {
    $title_parts[] = "Kegiatan pada " . formatDate($custom_date);
} else if ($filter === 'current') {
    $title_parts[] = "Hari Ini";
    } elseif ($filter === 'all') {
    $title_parts[] = "Semua";
} elseif ($filter === '1_month') {
    $title_parts[] = "Bulan Ini";
} elseif ($filter === '3_months') {
    $title_parts[] = "3 Bulan Mendatang";

}

// Add semester and prodi to title only if 'all' time filter is selected
if ($filter === 'all') {
    if ($semester_filter && $semester_filter !== 'Semua Semester') {
        $title_parts[] = "Semester " . $semester_filter;
    }
    if ($prodi_filter && $prodi_filter !== 'Semua Prodi') {
        $title_parts[] = "Prodi " . $prodi_filter;
    }
}
$page_title = implode(" - ", $title_parts);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #f0f2f5;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 10px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 1px solid #e0e0e0;
        }

        h1 {
            color: #000000;
            text-align: center;
            margin-top: 5px;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
            line-height: 1.2;
        }

        .header-logo {
            display: block;
            margin: 0 auto 5px auto;
            height: 80px;
            max-width: 100%;
        }

        /* Dropdown Filters */
        .filter-dropdowns {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f0f2f5;
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.08);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }

        .filter-group label {
            font-size: 0.9em;
            font-weight: 500;
            color: #555;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-group select,
        .filter-group input[type="date"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: 'Roboto', sans-serif;
            font-size: 1em;
            color: #333;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
            transition: border-color 0.3s ease;
            min-width: 150px;
            background-color: #ffffff;
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13%205.1L146.2%20205.9%2018.5%2074.5a17.6%2017.6%200%200%200-25.3%2023.7l130.4%20130.4c6.8%206.8%2017.9%206.8%2024.7%200l130.4-130.4a17.6%2017.6%200%200%200-13-30.2z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 8px top 50%;
            background-size: 12px auto;
        }

        .filter-group select:focus,
        .filter-group input[type="date"]:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05), 0 0 0 3px rgba(26,115,232,0.2);
        }
        
        /* Calendar List */
        .calendar-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .calendar-item {
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px 20px;
            display: flex;
            align-items: flex-start;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.07);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .calendar-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .calendar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 8px;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        /* Accent colors - using some random but distinct colors for variety */
        .calendar-item:nth-child(even)::before { background-color: #4CAF50; }
        .calendar-item:nth-child(odd)::before { background-color: #2196F3; }
        .calendar-item:nth-child(3n)::before { background-color: #FFC107; }
        .calendar-item:nth-child(4n)::before { background-color: #E91E63; }
        .calendar-item:nth-child(5n)::before { background-color: #9C27B0; }


        .activity-details {
            flex-grow: 1;
            padding-left: 20px;
        }

        .activity-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .semester-badge {
            font-size: 0.75em;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .semester-badge.ganjil {
            background-color: #001f4c;
            color: #ffffff;
        }

        .semester-badge.genap {
            background-color: #FFD700;
            color: #000000;
        }

        .activity-date {
            font-size: 0.95em;
            color: #666;
        }

        .no-activities {
            text-align: center;
            color: #777;
            padding: 30px;
            font-style: italic;
        }

        /* WhatsApp Button */
        .whatsapp-button-container {
            text-align: center;
            margin-top: 30px;
        }

        .whatsapp-button {
            background-color: #25D366;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .whatsapp-button:hover {
            background-color: #1DA851;
            transform: translateY(-2px);
        }

        .whatsapp-button i {
            font-size: 1.2em;
        }
footer a {
  color: black;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .filter-dropdowns {
                flex-direction: column;
                align-items: stretch;
            }
            .filter-group select,
            .filter-group input[type="date"] {
                min-width: 100%;
            }
            .activity-name {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }
        }
        @media (max-width: 600px) {
            body {
                padding: 5px;
            }
            .container {
                padding: 15px;
            }
            h1 {
                font-size: 1.6em;
            }
            .activity-date {
                font-size: 0.85em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <center><img src="https://kangyop.github.io/images/logostikes.png" class="header-logo" alt="Logo STIKes Respati">
        </center><h1>KALENDER AKADEMIK<br>STIKes Respati T.A 2025/2026</h1>

        <div class="filter-dropdowns">
            <div class="filter-group">
                <label for="time_filter"><i class="far fa-clock"></i> Filter Waktu:</label>
                <select id="time_filter" onchange="applyFilters()">
                    <option value="current" <?php echo ($filter === 'current' ? 'selected' : ''); ?>>Sekarang</option>
                    <option value="all" <?php echo ($filter === 'all' ? 'selected' : ''); ?>>Semua Hari</option>
                    <option value="1_month" <?php echo ($filter === '1_month' ? 'selected' : ''); ?>>Bulan Ini</option>
                    <option value="3_months" <?php echo ($filter === '3_months' ? 'selected' : ''); ?>>3 Bulan Mendatang</option>
                    <option value="custom_date_option" <?php echo ($filter === 'custom_date' ? 'selected' : ''); ?>>Tanggal Kustom</option>
                </select>
            </div>

            <div class="filter-group" id="custom_date_group" style="display: <?php echo ($filter === 'custom_date' ? 'flex' : 'none'); ?>;">
                <label for="custom_date_input"><i class="far fa-calendar-check"></i> Tanggal Kustom:</label>
                <input type="date" id="custom_date_input" value="<?php echo htmlspecialchars($custom_date); ?>" onchange="applyFilters()">
            </div>

            <div class="filter-group" id="semester_filter_group" style="display: <?php echo ($filter === 'all' ? 'flex' : 'none'); ?>;">
                <label for="semester_filter"><i class="fas fa-calendar-alt"></i> Filter Semester:</label>
                <select id="semester_filter" onchange="applyFilters()">
                    <option value="Semua Semester" <?php echo ($semester_filter === 'Semua Semester' ? 'selected' : ''); ?>>Semua Semester</option>
                    <option value="Ganjil" <?php echo ($semester_filter === 'Ganjil' ? 'selected' : ''); ?>>Ganjil</option>
                    <option value="Genap" <?php echo ($semester_filter === 'Genap' ? 'selected' : ''); ?>>Genap</option>
                </select>
            </div>

            <div class="filter-group" id="prodi_filter_group" style="display: <?php echo ($filter === 'all' ? 'flex' : 'none'); ?>;">
                <label for="prodi_filter"><i class="fas fa-user-graduate"></i> Kegiatan Prodi:</label>
                <select id="prodi_filter" onchange="applyFilters()">
                    <?php foreach ($prodi_options as $prodi_name): ?>
                        <option value="<?php echo urlencode($prodi_name); ?>" <?php echo (urldecode($prodi_filter) === $prodi_name ? 'selected' : ''); ?>>
                            <?php echo htmlspecialchars($prodi_name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <ul class="calendar-list" id="calendarList">
            <?php if (!empty($display_activities)): ?>
                <?php foreach ($display_activities as $activity): ?>
                    <li class="calendar-item">
                        <div class="activity-details">
                            <div class="activity-name">
                                <?php echo htmlspecialchars($activity['name']); ?>
                                <?php if (!empty($activity['semester'])): ?>
                                    <span class="semester-badge <?php echo strtolower($activity['semester']); ?>">
                                        <?php echo htmlspecialchars($activity['semester']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="activity-date">
                                <?php echo formatDate($activity['start_date']); ?>
                                <?php if ($activity['start_date'] !== $activity['end_date']): ?>
                                    - <?php echo formatDate($activity['end_date']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-activities">Tidak ada kegiatan yang ditemukan untuk pilihan ini.</p>
            <?php endif; ?>
        </ul>

        <div class="whatsapp-button-container">
            <button class="whatsapp-button" onclick="sendToWhatsApp()">
                <i class="fab fa-whatsapp"></i> Kirim Kegiatan Ke WhatsApp
            </button>
        </div><footer>
  <center><p>© 2025 <a href="https://kangyop.github.io" target="_blank" class="black-link"><strong>KangYop</strong></a> ·
  <a href="https://linktr.ee/akademik_sr" target="_blank">Web Akademik SR</a></p></center>
</footer>
    </div>

    <script>
        // JavaScript to apply filters based on dropdowns and date input
        function applyFilters() {
            const timeFilter = document.getElementById('time_filter').value;
            const semesterFilter = document.getElementById('semester_filter').value;
            const prodiFilter = document.getElementById('prodi_filter').value;
            const customDateInput = document.getElementById('custom_date_input').value;

            let queryString = '';

            // Handle time filter logic
            if (timeFilter === 'custom_date_option') {
                queryString += `filter=custom_date&custom_date=${customDateInput}`;
            } else {
                queryString += `filter=${timeFilter}&custom_date=`;
            }

            // Always pass semester and prodi filters, but they will only be applied in PHP if filter_type is 'all'
            queryString += `&semester=${semesterFilter}`;
            queryString += `&prodi=${prodiFilter}`;

            // Redirect to update the URL and apply filters
            window.location.href = `?${queryString}`;
        }

        // JavaScript for WhatsApp functionality
        function sendToWhatsApp() {
            const activities = document.querySelectorAll('#calendarList .calendar-item');
            const currentDateTime = new Date().toLocaleString('id-ID', {
                day: '2-digit', month: 'long', year: 'numeric',
                hour: '2-digit', minute: '2-digit', hour12: false
            });
            let message = `*Kalender Akademik STIKes Respati*\n\n`;

            if (activities.length === 0) {
                message += "Tidak ada kegiatan yang ditemukan untuk filter saat ini.";
            } else {
                activities.forEach((item, index) => {
                    const nameElement = item.querySelector('.activity-name');
                    const name = nameElement.firstChild.nodeType === Node.TEXT_NODE ? nameElement.firstChild.textContent.trim() : '';
                    const semesterBadge = item.querySelector('.semester-badge');
                    const semesterText = semesterBadge ? ` (${semesterBadge.innerText})` : '';
                    const date = item.querySelector('.activity-date').innerText;
                    message += `${index + 1}. *${name}*${semesterText}\n   Tanggal: ${date}\n\n`;
                });
            }
            message += `\nDiperbarui pada: ${currentDateTime} WIB`;

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;

            window.open(whatsappUrl, '_blank');
        }

        // Initialize default values and manage visibility
        document.addEventListener('DOMContentLoaded', () => {
            const timeFilterDropdown = document.getElementById('time_filter');
            const customDateGroup = document.getElementById('custom_date_group');
            const semesterFilterGroup = document.getElementById('semester_filter_group'); // New
            const prodiFilterGroup = document.getElementById('prodi_filter_group');     // New

            // Set default date for custom_date_input if it's empty
            const customDateInput = document.getElementById('custom_date_input');
            if (customDateInput && customDateInput.value === '') {
                customDateInput.valueAsDate = new Date();
            }

            // Function to manage visibility of all filter groups
            function updateFilterGroupVisibility() {
                const selectedTimeFilter = timeFilterDropdown.value;

                // Toggle visibility for custom date filter
                if (selectedTimeFilter === 'custom_date_option') {
                    customDateGroup.style.display = 'flex';
                } else {
                    customDateGroup.style.display = 'none';
                }

                // Toggle visibility for semester and prodi filters
                if (selectedTimeFilter === 'all') {
                    semesterFilterGroup.style.display = 'flex';
                    prodiFilterGroup.style.display = 'flex';
                } else {
                    semesterFilterGroup.style.display = 'none';
                    prodiFilterGroup.style.display = 'none';
                }
            }

            // Initial call to set visibility on page load
            updateFilterGroupVisibility();

            // Listen for changes on the time filter dropdown
            timeFilterDropdown.addEventListener('change', updateFilterGroupVisibility);
        });
    </script>
</body>
</html>
