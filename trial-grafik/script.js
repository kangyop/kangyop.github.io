document.addEventListener('DOMContentLoaded', () => {
    // Memuat plugin dayjs
    dayjs.extend(dayjs_plugin_isBetween);

    // Mendapatkan referensi ke elemen HTML
    const childInfoForm = document.getElementById('child-info-form');
    const namaLengkapInput = document.getElementById('namaLengkap');
    const tanggalLahirInput = document.getElementById('tanggalLahir');
    const genderSelect = document.getElementById('gender'); // Menambahkan elemen gender

    const grafikBeratBtn = document.getElementById('grafikBeratBtn');
    const grafikTinggiBtn = document.getElementById('grafikTinggiBtn');
    const growthChartCanvas = document.getElementById('growthChart');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const chartClassificationDiv = document.getElementById('chartClassification');

    const addDataForm = document.getElementById('addDataForm');
    const tanggalCekInput = document.getElementById('tanggalCek');
    const beratBadanInput = document.getElementById('beratBadan');
    const tinggiBadanInput = document.getElementById('tinggiBadan');
    const lingkarKepalaInput = document.getElementById('lingkarKepala');
    const lilaInput = document.getElementById('lila');

    const historyList = document.getElementById('historyList');

    // Menginisialisasi data anak dari localStorage atau data default
    let childData = JSON.parse(localStorage.getItem('childData')) || {
        namaLengkap: '',
        tanggalLahir: '',
        gender: '', // Menambahkan properti gender
        growthRecords: []
    };
    let currentChartType = 'berat'; // 'berat' atau 'tinggi'
    let growthChart;
    let currentMonthOffset = 0; // Offset untuk menggeser tampilan grafik

    // --- Data Standar Tumbuh Kembang WHO (0-60 Bulan) ---
    // Struktur: {bulan: [P3, P50, P97]}
    // Sumber data: Data standar WHO yang disederhanakan untuk contoh.
    // Untuk keakuratan klinis, pastikan menggunakan data WHO resmi.
    const whoGrowthData = {
        berat: {
            male: {
                0: [2.5, 3.3, 4.5], 1: [3.4, 4.2, 5.7], 2: [4.4, 5.3, 6.9], 3: [5.0, 6.0, 7.8], 4: [5.4, 6.4, 8.4],
                5: [5.7, 6.7, 8.8], 6: [5.9, 7.0, 9.2], 7: [6.1, 7.2, 9.5], 8: [6.3, 7.4, 9.7], 9: [6.4, 7.6, 9.9],
                10: [6.6, 7.8, 10.2], 11: [6.7, 7.9, 10.4], 12: [6.9, 8.1, 10.6], 13: [7.0, 8.2, 10.8],
                14: [7.2, 8.4, 11.0], 15: [7.3, 8.6, 11.2], 16: [7.5, 8.8, 11.4], 17: [7.7, 9.0, 11.6],
                18: [7.8, 9.2, 11.8], 19: [8.0, 9.4, 12.1], 20: [8.1, 9.6, 12.3], 21: [8.3, 9.8, 12.5],
                22: [8.5, 9.9, 12.7], 23: [8.6, 10.1, 12.9], 24: [8.8, 10.2, 13.1], 25: [8.9, 10.4, 13.3],
                26: [9.1, 10.6, 13.5], 27: [9.2, 10.7, 13.7], 28: [9.4, 10.9, 13.9], 29: [9.5, 11.0, 14.1],
                30: [9.7, 11.2, 14.3], 31: [9.8, 11.4, 14.5], 32: [10.0, 11.5, 14.7], 33: [10.1, 11.7, 14.9],
                34: [10.3, 11.9, 15.1], 35: [10.4, 12.0, 15.3], 36: [10.6, 12.2, 15.5], 37: [10.7, 12.3, 15.7],
                38: [10.9, 12.5, 15.9], 39: [11.0, 12.7, 16.1], 40: [11.2, 12.8, 16.3], 41: [11.3, 13.0, 16.5],
                42: [11.5, 13.1, 16.7], 43: [11.6, 13.3, 16.9], 44: [11.8, 13.4, 17.1], 45: [11.9, 13.6, 17.3],
                46: [12.1, 13.7, 17.5], 47: [12.2, 13.9, 17.7], 48: [12.4, 14.1, 17.9], 49: [12.5, 14.2, 18.0],
                50: [12.7, 14.4, 18.2], 51: [12.8, 14.5, 18.4], 52: [13.0, 14.7, 18.6], 53: [13.1, 14.8, 18.8],
                54: [13.3, 15.0, 19.0], 55: [13.4, 15.1, 19.1], 56: [13.6, 15.3, 19.3], 57: [13.7, 15.4, 19.5],
                58: [13.9, 15.6, 19.7], 59: [14.0, 15.7, 19.8], 60: [14.2, 15.9, 20.0]
            },
            female: {
                0: [2.4, 3.2, 4.4], 1: [3.2, 3.9, 5.4], 2: [4.0, 4.8, 6.3], 3: [4.5, 5.4, 7.1], 4: [4.9, 5.8, 7.6],
                5: [5.2, 6.1, 8.0], 6: [5.4, 6.4, 8.3], 7: [5.6, 6.6, 8.6], 8: [5.8, 6.8, 8.9], 9: [5.9, 6.9, 9.1],
                10: [6.1, 7.1, 9.3], 11: [6.2, 7.2, 9.5], 12: [6.4, 7.4, 9.7], 13: [6.5, 7.6, 9.9],
                14: [6.7, 7.8, 10.1], 15: [6.8, 8.0, 10.3], 16: [7.0, 8.2, 10.5], 17: [7.1, 8.3, 10.7],
                18: [7.3, 8.5, 10.9], 19: [7.4, 8.7, 11.1], 20: [7.6, 8.8, 11.3], 21: [7.7, 9.0, 11.5],
                22: [7.9, 9.2, 11.7], 23: [8.0, 9.3, 11.9], 24: [8.2, 9.5, 12.1], 25: [8.3, 9.7, 12.3],
                26: [8.5, 9.8, 12.5], 27: [8.6, 10.0, 12.7], 28: [8.8, 10.1, 12.9], 29: [8.9, 10.3, 13.0],
                30: [9.1, 10.4, 13.2], 31: [9.2, 10.6, 13.4], 32: [9.4, 10.7, 13.6], 33: [9.5, 10.9, 13.7],
                34: [9.7, 11.0, 13.9], 35: [9.8, 11.2, 14.1], 36: [10.0, 11.3, 14.3], 37: [10.1, 11.5, 14.4],
                38: [10.3, 11.6, 14.6], 39: [10.4, 11.8, 14.8], 40: [10.6, 11.9, 14.9], 41: [10.7, 12.1, 15.1],
                42: [10.9, 12.2, 15.3], 43: [11.0, 12.4, 15.4], 44: [11.2, 12.5, 15.6], 45: [11.3, 12.7, 15.8],
                46: [11.5, 12.8, 15.9], 47: [11.6, 13.0, 16.1], 48: [11.8, 13.1, 16.3], 49: [11.9, 13.3, 16.4],
                50: [12.1, 13.4, 16.6], 51: [12.2, 13.6, 16.7], 52: [12.4, 13.7, 16.9], 53: [12.5, 13.9, 17.0],
                54: [12.7, 14.0, 17.2], 55: [12.8, 14.2, 17.3], 56: [13.0, 14.3, 17.5], 57: [13.1, 14.5, 17.6],
                58: [13.3, 14.6, 17.8], 59: [13.4, 14.8, 17.9], 60: [13.6, 14.9, 18.1]
            }
        },
        tinggi: {
            male: {
                0: [45.0, 49.9, 54.0], 1: [49.5, 54.7, 59.5], 2: [53.0, 58.4, 63.5], 3: [55.5, 60.9, 66.5], 4: [57.5, 62.9, 68.5],
                5: [59.0, 64.5, 70.0], 6: [60.5, 66.0, 71.5], 7: [61.5, 67.2, 72.8], 8: [62.5, 68.3, 74.0], 9: [63.5, 69.4, 75.0],
                10: [64.5, 70.5, 76.0], 11: [65.5, 71.6, 77.0], 12: [66.5, 72.7, 78.0], 13: [67.4, 73.8, 79.1],
                14: [68.2, 74.8, 80.2], 15: [69.0, 75.8, 81.2], 16: [69.8, 76.8, 82.2], 17: [70.6, 77.7, 83.2],
                18: [71.3, 78.6, 84.2], 19: [72.1, 79.5, 85.1], 20: [72.8, 80.4, 86.1], 21: [73.5, 81.3, 87.0],
                22: [74.2, 82.1, 87.9], 23: [74.9, 82.9, 88.8], 24: [75.6, 83.7, 89.7], 25: [76.2, 84.5, 90.5],
                26: [76.9, 85.3, 91.3], 27: [77.5, 86.0, 92.1], 28: [78.2, 86.8, 92.9], 29: [78.8, 87.5, 93.7],
                30: [79.4, 88.2, 94.4], 31: [80.0, 88.9, 95.2], 32: [80.6, 89.6, 95.9], 33: [81.2, 90.3, 96.6],
                34: [81.8, 90.9, 97.3], 35: [82.4, 91.6, 98.0], 36: [82.9, 92.3, 98.7], 37: [83.5, 92.9, 99.4],
                38: [84.0, 93.6, 100.0], 39: [84.6, 94.2, 100.7], 40: [85.1, 94.8, 101.3], 41: [85.7, 95.5, 102.0],
                42: [86.2, 96.1, 102.6], 43: [86.8, 96.7, 103.3], 44: [87.3, 97.3, 103.9], 45: [87.8, 97.9, 104.5],
                46: [88.4, 98.5, 105.1], 47: [88.9, 99.1, 105.7], 48: [89.4, 99.7, 106.3], 49: [89.9, 100.3, 106.9],
                50: [90.4, 100.8, 107.5], 51: [90.9, 101.4, 108.0], 52: [91.4, 102.0, 108.6], 53: [91.9, 102.5, 109.1],
                54: [92.4, 103.1, 109.7], 55: [92.9, 103.6, 110.2], 56: [93.4, 104.2, 110.8], 57: [93.9, 104.7, 111.3],
                58: [94.4, 105.3, 111.9], 59: [94.9, 105.8, 112.4], 60: [95.3, 106.3, 112.9]
            },
            female: {
                0: [44.0, 49.1, 53.0], 1: [48.0, 53.7, 58.5], 2: [51.5, 57.1, 62.0], 3: [54.0, 59.8, 64.5], 4: [56.0, 61.6, 66.5],
                5: [57.5, 63.2, 68.0], 6: [59.0, 64.7, 69.5], 7: [60.0, 66.0, 70.8], 8: [61.0, 67.2, 72.0], 9: [62.0, 68.3, 73.0],
                10: [63.0, 69.5, 74.0], 11: [64.0, 70.6, 75.0], 12: [65.0, 71.8, 76.0], 13: [65.9, 72.8, 77.1],
                14: [66.8, 73.8, 78.1], 15: [67.6, 74.8, 79.1], 16: [68.5, 75.7, 80.0], 17: [69.3, 76.6, 81.0],
                18: [70.1, 77.5, 81.9], 19: [70.9, 78.4, 82.8], 20: [71.7, 79.2, 83.7], 21: [72.5, 80.1, 84.6],
                22: [73.2, 80.9, 85.4], 23: [74.0, 81.7, 86.3], 24: [74.7, 82.5, 87.1], 25: [75.4, 83.3, 87.9],
                26: [76.1, 84.0, 88.7], 27: [76.8, 84.8, 89.5], 28: [77.5, 85.5, 90.2], 29: [78.1, 86.2, 91.0],
                30: [78.8, 86.9, 91.7], 31: [79.4, 87.6, 92.4], 32: [80.1, 88.3, 93.1], 33: [80.7, 89.0, 93.8],
                34: [81.3, 89.6, 94.5], 35: [81.9, 90.3, 95.1], 36: [82.5, 90.9, 95.8], 37: [83.1, 91.5, 96.4],
                38: [83.7, 92.2, 97.1], 39: [84.3, 92.8, 97.7], 40: [84.9, 93.4, 98.3], 41: [85.4, 94.0, 98.9],
                42: [86.0, 94.6, 99.5], 43: [86.6, 95.2, 100.1], 44: [87.1, 95.8, 100.7], 45: [87.7, 96.4, 101.3],
                46: [88.2, 96.9, 101.8], 47: [88.8, 97.5, 102.4], 48: [89.3, 98.1, 103.0], 49: [89.8, 98.6, 103.5],
                50: [90.3, 99.2, 104.1], 51: [90.9, 99.7, 104.6], 52: [91.4, 100.3, 105.2], 53: [91.9, 100.8, 105.7],
                54: [92.4, 101.3, 106.2], 55: [92.9, 101.9, 106.8], 56: [93.4, 102.4, 107.3], 57: [93.9, 102.9, 107.8],
                58: [94.4, 103.5, 108.3], 59: [94.9, 104.0, 108.8], 60: [95.3, 104.5, 109.3]
            }
        }
    };

    // --- Fungsi Bantuan ---

    function saveChildData() {
        localStorage.setItem('childData', JSON.stringify(childData));
    }

    function calculateAgeInMonths(birthDate, checkDate) {
        if (!birthDate || !checkDate) return null;
        const birth = dayjs(birthDate);
        const check = dayjs(checkDate);
        return check.diff(birth, 'month');
    }

    function getClassification(value, month, type, gender) {
        const data = whoGrowthData[type][gender];
        if (!data || !data[month]) {
            return "Klasifikasi tidak tersedia untuk usia ini.";
        }
        const [p3, p50, p97] = data[month]; // P3, P50 (median), P97

        // Klasifikasi sederhana berdasarkan persentil
        if (value < p3) {
            return `Sangat Rendah (di bawah P3).`;
        } else if (value < p50) {
            return `Rendah (antara P3 dan P50).`;
        } else if (value > p97) {
            return `Sangat Tinggi (di atas P97).`;
        } else if (value > p50) {
            return `Tinggi (antara P50 dan P97).`;
        } else {
            return `Normal (sekitar P50).`;
        }
    }

    function getWHOLineData(type, lineIndex, gender, startMonth = 0, endMonth = 60) {
        const data = whoGrowthData[type][gender];
        const result = [];
        for (let i = startMonth; i <= endMonth; i++) {
            if (data[i]) {
                result.push({ x: i, y: data[i][lineIndex] });
            } else {
                // Jika tidak ada data untuk bulan tertentu, Chart.js akan membuat garis putus-putus
                result.push({ x: i, y: null });
            }
        }
        return result;
    }

    // --- Fungsi Grafik ---

    function renderChart() {
        const ctx = growthChartCanvas.getContext('2d');
        if (growthChart) {
            growthChart.destroy();
        }

        const birthDate = childData.tanggalLahir ? dayjs(childData.tanggalLahir) : null;
        const childGender = childData.gender || 'male'; // Default ke 'male' jika belum disetel
        const currentAgeMonths = birthDate ? dayjs().diff(birthDate, 'month') : 0;

        // Tentukan rentang bulan yang akan ditampilkan di sumbu X
        // Tampilkan 12 bulan di sekitar usia saat ini (atau terakhir diinput)
        let displayStartMonth = 0;
        let displayEndMonth = 60; // Default untuk menampilkan full 0-60 bulan

        if (childData.growthRecords.length > 0 && birthDate) {
            const lastRecord = childData.growthRecords[childData.growthRecords.length - 1];
            const lastAgeInMonths = calculateAgeInMonths(birthDate, lastRecord.tanggalCek);
            if (lastAgeInMonths !== null) {
                // Tentukan rentang tampilan agar titik terakhir berada di tengah
                const windowSize = 12; // Tampilkan 12 bulan
                displayStartMonth = Math.max(0, lastAgeInMonths - Math.floor(windowSize / 2) + currentMonthOffset);
                displayEndMonth = Math.min(60, displayStartMonth + windowSize);

                // Sesuaikan jika terlalu dekat dengan awal atau akhir
                if (displayEndMonth - displayStartMonth < windowSize) {
                    displayStartMonth = Math.max(0, displayEndMonth - windowSize);
                }
            }
        }


        const chartLabels = Array.from({ length: 61 }, (_, i) => `${i} bln`); // Labels 0-60 bulan

        const userDataPoints = childData.growthRecords
            .map(record => {
                const ageInMonths = calculateAgeInMonths(childData.tanggalLahir, record.tanggalCek);
                if (ageInMonths !== null && ageInMonths >= 0 && ageInMonths <= 60) {
                    return {
                        x: ageInMonths,
                        y: currentChartType === 'berat' ? record.beratBadan : record.tinggiBadan,
                        tanggalCek: record.tanggalCek, // Simpan tanggal asli untuk tooltip
                        beratBadan: record.beratBadan,
                        tinggiBadan: record.tinggiBadan,
                        lingkarKepala: record.lingkarKepala,
                        lila: record.lila
                    };
                }
                return null;
            })
            .filter(point => point !== null); // Hapus titik null

        const datasets = [
            {
                label: 'WHO P3',
                data: getWHOLineData(currentChartType, 0, childGender, 0, 60),
                borderColor: 'rgba(255, 99, 132, 0.5)', // Merah muda
                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                borderWidth: 1,
                fill: false,
                pointRadius: 0,
                tension: 0.3 // Sedikit melengkung
            },
            {
                label: 'WHO P50 (Median)',
                data: getWHOLineData(currentChartType, 1, childGender, 0, 60),
                borderColor: 'rgba(75, 192, 192, 1)', // Tosca
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: false,
                pointRadius: 0,
                tension: 0.3
            },
            {
                label: 'WHO P97',
                data: getWHOLineData(currentChartType, 2, childGender, 0, 60),
                borderColor: 'rgba(54, 162, 235, 0.5)', // Biru muda
                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                borderWidth: 1,
                fill: false,
                pointRadius: 0,
                tension: 0.3
            },
            {
                label: 'Data Anak',
                data: userDataPoints,
                borderColor: 'black',
                backgroundColor: 'black',
                borderWidth: 2,
                pointRadius: 6, // Ukuran titik data anak
                pointBackgroundColor: 'black',
                type: 'line', // Pastikan tipe line untuk titik
                tension: 0.1,
                showLine: false // Hanya tampilkan titik, tanpa garis antar titik
            }
        ];

        growthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Pertahankan ini agar tidak memanjang
                layout: {
                    padding: {
                        left: 10,
                        right: 20,
                        top: 20,
                        bottom: 10
                    }
                },
                scales: {
                    x: {
                        type: 'linear',
                        min: displayStartMonth, // Dimulai dari bulan yang dihitung
                        max: displayEndMonth,   // Sampai bulan yang dihitung
                        title: {
                            display: true,
                            text: 'Usia (Bulan)',
                            font: { size: 14, weight: 'bold', family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif' }
                        },
                        ticks: {
                            stepSize: 1, // Tampilkan setiap bulan
                            font: { size: 12, family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif' }
                        },
                        grid: {
                            display: true, // Tampilkan garis grid vertikal
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: currentChartType === 'berat' ? 'Berat Badan (kg)' : 'Tinggi Badan (cm)',
                            font: { size: 14, weight: 'bold', family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif' }
                        },
                        ticks: {
                            font: { size: 12, family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif' }
                        },
                        grid: {
                            display: true, // Tampilkan garis grid horizontal
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: { size: 14, family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif' }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            title: function(context) {
                                const ageMonth = context[0].parsed.x;
                                return `Usia: ${ageMonth} Bulan`;
                            },
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label === 'Data Anak' && context.raw) {
                                    const record = context.raw;
                                    return [
                                        `Tanggal Cek: ${record.tanggalCek}`,
                                        `Berat: ${record.beratBadan} kg`,
                                        `Tinggi: ${record.tinggiBadan} cm`,
                                        `Lingkar Kepala: ${record.lingkarKepala} cm`,
                                        `LILA: ${record.lila} cm`
                                    ];
                                } else if (context.parsed.y !== null) {
                                    return `${label}: ${context.parsed.y.toFixed(2)} ${currentChartType === 'berat' ? 'kg' : 'cm'}`;
                                }
                                return null;
                            }
                        }
                    }
                }
            }
        });

        // Update klasifikasi setelah grafik di-render
        updateClassificationDisplay();
    }

    // --- Fungsi untuk Menggeser Tampilan Grafik ---
    function updateChartScroll() {
        if (!growthChart || !childData.tanggalLahir) return;

        const birthDate = dayjs(childData.tanggalLahir);
        const currentAgeMonths = dayjs().diff(birthDate, 'month');

        // Jika ada data record, tampilkan di sekitar data terakhir
        let targetMonth = currentAgeMonths;
        if (childData.growthRecords.length > 0) {
            const lastRecord = childData.growthRecords[childData.growthRecords.length - 1];
            targetMonth = calculateAgeInMonths(childData.tanggalLahir, lastRecord.tanggalCek);
        }

        targetMonth += currentMonthOffset; // Terapkan offset

        const windowSize = 12; // Tampilkan 12 bulan dalam satu layar
        let displayStartMonth = Math.max(0, targetMonth - Math.floor(windowSize / 2));
        let displayEndMonth = Math.min(60, displayStartMonth + windowSize);

        // Sesuaikan jika terlalu dekat dengan awal atau akhir
        if (displayEndMonth - displayStartMonth < windowSize) {
            if (displayStartMonth === 0) { // Jika sudah di awal
                displayEndMonth = windowSize;
            } else if (displayEndMonth === 60) { // Jika sudah di akhir
                displayStartMonth = Math.max(0, 60 - windowSize);
            }
        }


        growthChart.options.scales.x.min = displayStartMonth;
        growthChart.options.scales.x.max = displayEndMonth;
        growthChart.update();
    }


    function updateClassificationDisplay() {
        if (!childData.tanggalLahir || childData.growthRecords.length === 0 || !childData.gender) {
            chartClassificationDiv.textContent = "Masukkan informasi anak (termasuk jenis kelamin) dan data tumbuh kembang untuk melihat klasifikasi.";
            return;
        }

        const lastRecord = childData.growthRecords[childData.growthRecords.length - 1];
        const ageInMonths = calculateAgeInMonths(childData.tanggalLahir, lastRecord.tanggalCek);
        const childGender = childData.gender;

        let classificationText = `Klasifikasi Terakhir (Usia ${ageInMonths} bulan):\n`;

        if (currentChartType === 'berat') {
            const beratKlasifikasi = getClassification(lastRecord.beratBadan, ageInMonths, 'berat', childGender);
            classificationText += `Berat Badan: ${lastRecord.beratBadan} kg. ${beratKlasifikasi}\n`;
        } else {
            const tinggiKlasifikasi = getClassification(lastRecord.tinggiBadan, ageInMonths, 'tinggi', childGender);
            classificationText += `Tinggi Badan: ${lastRecord.tinggiBadan} cm. ${tinggiKlasifikasi}\n`;
        }

        chartClassificationDiv.textContent = classificationText;
    }


    // --- Event Listeners ---
    childInfoForm.addEventListener('submit', (e) => {
        e.preventDefault();
        childData.namaLengkap = namaLengkapInput.value;
        childData.tanggalLahir = tanggalLahirInput.value;
        childData.gender = genderSelect.value; // Simpan jenis kelamin
        saveChildData();
        alert('Informasi anak tersimpan!');
        renderChart();
        updateHistoryList();
    });

    addDataForm.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!childData.tanggalLahir || !childData.gender) {
            alert('Harap isi Informasi Anak (Nama Lengkap, Tanggal Lahir, dan Jenis Kelamin) terlebih dahulu.');
            return;
        }

        const newRecord = {
            tanggalCek: tanggalCekInput.value,
            beratBadan: parseFloat(beratBadanInput.value),
            tinggiBadan: parseFloat(tinggiBadanInput.value),
            lingkarKepala: parseFloat(lingkarKepalaInput.value),
            lila: parseFloat(lilaInput.value)
        };

        const existingRecordIndex = childData.growthRecords.findIndex(r => r.tanggalCek === newRecord.tanggalCek);
        if (existingRecordIndex !== -1) {
            // Perbarui record yang sudah ada jika tanggalnya sama
            childData.growthRecords[existingRecordIndex] = newRecord;
            alert('Data pada tanggal ini berhasil diperbarui!');
        } else {
            childData.growthRecords.push(newRecord);
            // Urutkan data berdasarkan tanggal cek
            childData.growthRecords.sort((a, b) => dayjs(a.tanggalCek).valueOf() - dayjs(b.tanggalCek).valueOf());
            alert('Data tumbuh kembang berhasil ditambahkan!');
        }

        saveChildData();
        renderChart();
        updateHistoryList();
        addDataForm.reset(); // Kosongkan formulir setelah submit
    });

    grafikBeratBtn.addEventListener('click', () => {
        currentChartType = 'berat';
        grafikBeratBtn.classList.add('active');
        grafikTinggiBtn.classList.remove('active');
        renderChart();
    });

    grafikTinggiBtn.addEventListener('click', () => {
        currentChartType = 'tinggi';
        grafikTinggiBtn.classList.add('active');
        grafikBeratBtn.classList.remove('active');
        renderChart();
    });

    prevMonthBtn.addEventListener('click', () => {
        currentMonthOffset -= 1; // Geser tampilan ke kiri (bulan sebelumnya)
        updateChartScroll();
    });

    nextMonthBtn.addEventListener('click', () => {
        currentMonthOffset += 1; // Geser tampilan ke kanan (bulan berikutnya)
        updateChartScroll();
    });

    // --- Fungsi Riwayat Data ---
    function updateHistoryList() {
        historyList.innerHTML = ''; // Kosongkan daftar sebelumnya
        if (childData.growthRecords.length === 0) {
            historyList.innerHTML = '<li>Belum ada riwayat data.</li>';
            return;
        }

        childData.growthRecords.forEach((record, index) => {
            const listItem = document.createElement('li');
            const ageInMonths = calculateAgeInMonths(childData.tanggalLahir, record.tanggalCek);
            listItem.innerHTML = `
                <span>
                    <strong>Tanggal Cek:</strong> ${record.tanggalCek} (Usia: ${ageInMonths !== null ? ageInMonths + ' bln' : 'N/A'})<br>
                    <strong>Berat:</strong> ${record.beratBadan} kg<br>
                    <strong>Tinggi:</strong> ${record.tinggiBadan} cm<br>
                    <strong>Lingkar Kepala:</strong> ${record.lingkarKepala} cm<br>
                    <strong>LILA:</strong> ${record.lila} cm
                </span>
                <button class="delete-btn" data-index="${index}">Hapus</button>
            `;
            historyList.appendChild(listItem);
        });

        // Tambahkan event listener untuk tombol hapus
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                const indexToDelete = parseInt(e.target.dataset.index);
                childData.growthRecords.splice(indexToDelete, 1); // Hapus elemen dari array
                saveChildData(); // Simpan perubahan
                renderChart(); // Perbarui grafik
                updateHistoryList(); // Perbarui daftar riwayat
            });
        });
    }

    // --- Inisialisasi Aplikasi Saat Memuat Halaman ---
    // Memuat data anak yang tersimpan
    if (childData.namaLengkap) {
        namaLengkapInput.value = childData.namaLengkap;
    }
    if (childData.tanggalLahir) {
        tanggalLahirInput.value = childData.tanggalLahir;
    }
    if (childData.gender) {
        genderSelect.value = childData.gender;
    }

    renderChart(); // Render grafik awal
    updateHistoryList(); // Perbarui daftar riwayat awal

    // Mengarahkan tampilan grafik ke bulan terakhir input data
    if (childData.growthRecords.length > 0 && childData.tanggalLahir) {
        const lastRecord = childData.growthRecords[childData.growthRecords.length - 1];
        const lastAgeInMonths = calculateAgeInMonths(childData.tanggalLahir, lastRecord.tanggalCek);
        if (lastAgeInMonths !== null) {
            // Hitung offset agar bulan terakhir di tengah
            const windowSize = 12; // Ukuran jendela bulan yang ditampilkan
            const centerOffset = Math.floor(windowSize / 2);
            currentMonthOffset = lastAgeInMonths - (displayStartMonth + centerOffset);
            updateChartScroll(); // Perbarui posisi scroll setelah inisialisasi
        }
    }
});