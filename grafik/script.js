// Data penyimpanan lokal
let childData = JSON.parse(localStorage.getItem('childData')) || null;
let growthRecords = JSON.parse(localStorage.getItem('growthRecords')) || [];

// Referensi elemen DOM
const childForm = document.getElementById('childForm');
const fullNameInput = document.getElementById('fullName');
const dobInput = document.getElementById('dob');

const toggleBeratButton = document.getElementById('toggleBerat');
const toggleTinggiButton = document.getElementById('toggleTinggi');
const growthChartCanvas = document.getElementById('growthChart');
let growthChartInstance; // Akan menyimpan instance Chart.js

const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');
const currentMonthDisplay = document.getElementById('currentMonthDisplay');
const classificationText = document.getElementById('classificationText');

const dataEntryForm = document.getElementById('dataEntryForm');
const checkDateInput = document.getElementById('checkDate');
const weightInput = document.getElementById('weight');
const heightInput = document.getElementById('height');
const headCircInput = document.getElementById('headCirc');
const lilaInput = document.getElementById('lila');

const dataHistoryList = document.getElementById('dataHistoryList');

let currentChartType = 'berat'; // 'berat' atau 'tinggi'
let currentDisplayMonthOffset = 0; // Offset bulan dari bulan pertama data
const MAX_MONTHS_DISPLAY = 12; // Menampilkan 12 bulan per tampilan
const MAX_GROWTH_MONTHS = 60; // Hingga 5 tahun (60 bulan)

// --- DATA STANDAR WHO (CONTOH) ---
// CATATAN: DATA INI HANYA CONTOH. SILAKAN GANTI DENGAN DATA WHO ASLI UNTUK PERSENTIL P3, P50, P97 (atau Z-score)
// Anda perlu mendapatkan data WHO yang lebih lengkap dan akurat, biasanya dibagi berdasarkan gender.
// Contoh format: { bulan: [P3, P50, P97] }
const whoGrowthData = {
    berat: { // Laki-laki, 0-60 bulan (Contoh data, perlu diganti!)
        0: [2.5, 3.3, 4.3], 1: [3.4, 4.5, 5.7], 2: [4.3, 5.6, 7.1], 3: [5.0, 6.4, 8.0],
        4: [5.4, 7.0, 8.7], 5: [5.7, 7.5, 9.3], 6: [6.0, 7.9, 9.8], 7: [6.2, 8.2, 10.2],
        8: [6.4, 8.5, 10.5], 9: [6.6, 8.7, 10.8], 10: [6.8, 8.9, 11.0], 11: [6.9, 9.1, 11.2],
        12: [7.1, 9.2, 11.4], 13: [7.2, 9.4, 11.6], 14: [7.3, 9.5, 11.7], 15: [7.4, 9.7, 11.9],
        16: [7.5, 9.8, 12.0], 17: [7.6, 9.9, 12.2], 18: [7.7, 10.0, 12.3], 19: [7.8, 10.1, 12.4],
        20: [7.9, 10.3, 12.6], 21: [8.0, 10.4, 12.7], 22: [8.1, 10.5, 12.8], 23: [8.2, 10.6, 13.0],
        24: [8.3, 10.7, 13.1], 25: [8.4, 10.8, 13.2], 26: [8.5, 10.9, 13.3], 27: [8.6, 11.0, 13.4],
        28: [8.7, 11.1, 13.5], 29: [8.8, 11.2, 13.6], 30: [8.9, 11.3, 13.7], 31: [9.0, 11.4, 13.8],
        32: [9.1, 11.5, 13.9], 33: [9.2, 11.6, 14.0], 34: [9.3, 11.7, 14.1], 35: [9.4, 11.8, 14.2],
        36: [9.5, 11.9, 14.3], 37: [9.6, 12.0, 14.4], 38: [9.7, 12.1, 14.5], 39: [9.8, 12.2, 14.6],
        40: [9.9, 12.3, 14.7], 41: [10.0, 12.4, 14.8], 42: [10.1, 12.5, 14.9], 43: [10.2, 12.6, 15.0],
        44: [10.3, 12.7, 15.1], 45: [10.4, 12.8, 15.2], 46: [10.5, 12.9, 15.3], 47: [10.6, 13.0, 15.4],
        48: [10.7, 13.1, 15.5], 49: [10.8, 13.2, 15.6], 50: [10.9, 13.3, 15.7], 51: [11.0, 13.4, 15.8],
        52: [11.1, 13.5, 15.9], 53: [11.2, 13.6, 16.0], 54: [11.3, 13.7, 16.1], 55: [11.4, 13.8, 16.2],
        56: [11.5, 13.9, 16.3], 57: [11.6, 14.0, 16.4], 58: [11.7, 14.1, 16.5], 59: [11.8, 14.2, 16.6],
        60: [11.9, 14.3, 16.7]
    },
    tinggi: { // Laki-laki, 0-60 bulan (Contoh data, perlu diganti!)
        0: [46.1, 49.9, 53.7], 1: [50.8, 54.7, 58.6], 2: [54.4, 58.4, 62.4], 3: [57.3, 61.4, 65.5],
        4: [59.7, 63.9, 68.0], 5: [61.7, 66.0, 70.2], 6: [63.3, 67.8, 72.2], 7: [64.8, 69.2, 73.7],
        8: [66.1, 70.6, 75.1], 9: [67.3, 71.9, 76.4], 10: [68.5, 73.1, 77.7], 11: [69.5, 74.3, 78.9],
        12: [70.5, 75.5, 80.0], 13: [71.5, 76.6, 81.1], 14: [72.4, 77.6, 82.2], 15: [73.3, 78.6, 83.2],
        16: [74.2, 79.5, 84.1], 17: [75.0, 80.4, 85.0], 18: [75.8, 81.3, 85.9], 19: [76.6, 82.1, 86.8],
        20: [77.4, 82.9, 87.6], 21: [78.1, 83.7, 88.4], 22: [78.8, 84.4, 89.2], 23: [79.5, 85.1, 89.9],
        24: [80.2, 85.8, 90.6], 25: [80.8, 86.5, 91.3], 26: [81.5, 87.2, 92.0], 27: [82.1, 87.8, 92.6],
        28: [82.7, 88.4, 93.3], 29: [83.3, 89.0, 93.9], 30: [83.9, 89.6, 94.5], 31: [84.5, 90.2, 95.1],
        32: [85.0, 90.7, 95.7], 33: [85.6, 91.3, 96.3], 34: [86.1, 91.8, 96.8], 35: [86.7, 92.4, 97.4],
        36: [87.2, 92.9, 97.9], 37: [87.7, 93.4, 98.4], 38: [88.2, 93.9, 98.9], 39: [88.7, 94.4, 99.4],
        40: [89.2, 94.9, 99.9], 41: [89.7, 95.4, 100.4], 42: [90.2, 95.9, 100.9], 43: [90.7, 96.4, 101.4],
        44: [91.2, 96.9, 101.9], 45: [91.7, 97.4, 102.4], 46: [92.1, 97.8, 102.8], 47: [92.6, 98.3, 103.3],
        48: [93.1, 98.8, 103.8], 49: [93.5, 99.2, 104.2], 50: [94.0, 99.7, 104.7], 51: [94.4, 100.1, 105.1],
        52: [94.9, 100.6, 105.6], 53: [95.3, 101.0, 106.0], 54: [95.8, 101.5, 106.5], 55: [96.2, 101.9, 106.9],
        56: [96.7, 102.4, 107.4], 57: [97.1, 102.8, 107.8], 58: [97.5, 103.2, 108.2], 59: [98.0, 103.7, 108.7],
        60: [98.4, 104.1, 109.1]
    }
};

// --- Fungsionalitas Utama ---

// Fungsi untuk inisialisasi atau update data anak
function initChildData() {
    if (childData) {
        fullNameInput.value = childData.fullName;
        dobInput.value = childData.dob;
        fullNameInput.disabled = true;
        dobInput.disabled = true;
        childForm.querySelector('button').textContent = 'Data Anak Tersimpan';
        childForm.querySelector('button').disabled = true;
    } else {
        fullNameInput.disabled = false;
        dobInput.disabled = false;
        childForm.querySelector('button').textContent = 'Simpan Data Anak';
        childForm.querySelector('button').disabled = false;
    }
    renderChart();
    renderHistory(); // Panggil renderHistory juga
}

// Menghitung usia dalam bulan
function calculateAgeInMonths(dobString, checkDateString) {
    if (!dobString || !checkDateString) return null;
    const dob = new Date(dobString + 'T00:00:00'); // Tambahkan T00:00:00 untuk menghindari masalah zona waktu
    const checkDate = new Date(checkDateString + 'T00:00:00');

    let months = (checkDate.getFullYear() - dob.getFullYear()) * 12;
    months -= dob.getMonth();
    months += checkDate.getMonth();

    // Sesuaikan jika tanggal cek lebih awal dari tanggal lahir di bulan yang sama
    if (checkDate.getDate() < dob.getDate()) {
        months--;
    }
    return Math.max(0, months); // Pastikan tidak negatif
}

// Mendapatkan klasifikasi pertumbuhan
function getGrowthClassification(ageInMonths, userData, whoDataForMonth, type) {
    if (!whoDataForMonth || userData === null || userData === undefined) {
        return "Data tidak lengkap untuk klasifikasi.";
    }

    const [p3, p50, p97] = whoDataForMonth;

    if (type === 'berat') {
        if (userData < p3) return "Berat badan sangat kurang (Underweight)";
        if (userData > p97) return "Berat badan berlebih (Overweight)";
        return "Berat badan normal";
    } else if (type === 'tinggi') {
        if (userData < p3) return "Tinggi badan sangat pendek (Stunted)";
        if (userData > p97) return "Tinggi badan sangat tinggi (Tall)";
        return "Tinggi badan normal";
    }
    return "Tidak dapat diklasifikasi";
}


// Render atau update grafik
function renderChart() {
    if (!childData) {
        if (growthChartInstance) {
            growthChartInstance.destroy();
            growthChartInstance = null;
        }
        growthChartCanvas.getContext('2d').clearRect(0, 0, growthChartCanvas.width, growthChartCanvas.height);
        currentMonthDisplay.textContent = "Data Anak Belum Tersimpan";
        classificationText.textContent = "Mohon simpan data anak terlebih dahulu.";
        return;
    }

    const labels = [];
    const whoP3Data = [];
    const whoP50Data = [];
    const whoP97Data = [];
    const userDataPoints = []; // Untuk data pengguna di grafik

    // Tentukan rentang bulan yang akan ditampilkan
    const startMonth = Math.max(0, currentDisplayMonthOffset);
    const endMonth = Math.min(MAX_GROWTH_MONTHS, startMonth + MAX_MONTHS_DISPLAY);

    for (let i = startMonth; i <= endMonth; i++) {
        labels.push(`Bulan ${i}`);
        const dataKey = currentChartType;
        const whoDataForMonth = whoGrowthData[dataKey] ? whoGrowthData[dataKey][i] : null;

        if (whoDataForMonth) {
            whoP3Data.push(whoDataForMonth[0]);
            whoP50Data.push(whoDataForMonth[1]);
            whoP97Data.push(whoDataForMonth[2]);
        } else {
            whoP3Data.push(null);
            whoP50Data.push(null);
            whoP97Data.push(null);
        }
    }

    // Siapkan data pengguna agar sesuai dengan label bulan yang ditampilkan
    for (let i = 0; i < labels.length; i++) {
        const monthOnChart = startMonth + i; // Bulan aktual yang diwakili oleh label
        const recordForThisMonth = growthRecords.find(record =>
            record.ageInMonths === monthOnChart
        );

        if (recordForThisMonth) {
            if (currentChartType === 'berat') {
                userDataPoints.push(recordForThisMonth.weight);
            } else { // tinggi
                userDataPoints.push(recordForThisMonth.height);
            }
        } else {
            userDataPoints.push(null); // Tidak ada data untuk bulan ini
        }
    }

    currentMonthDisplay.textContent = `Menampilkan Bulan ${startMonth} - ${endMonth}`;

    // Tentukan klasifikasi untuk data terakhir yang diinput
    let latestClassification = "Belum ada data cek.";
    if (growthRecords.length > 0) {
        const latestRecord = growthRecords[growthRecords.length - 1];
        const age = latestRecord.ageInMonths;
        const dataForClassification = currentChartType === 'berat' ? latestRecord.weight : latestRecord.height;
        const whoDataForAge = whoGrowthData[currentChartType] ? whoGrowthData[currentChartType][age] : null;

        if (whoDataForAge) {
            latestClassification = `Pada usia ${age} bulan, ${currentChartType === 'berat' ? 'berat badan' : 'tinggi badan'} anak: ${getGrowthClassification(age, dataForClassification, whoDataForAge, currentChartType)}`;
        } else {
            latestClassification = `Data standar WHO untuk usia ${age} bulan belum tersedia.`;
        }
    }
    classificationText.textContent = latestClassification;

    const datasets = [
        {
            label: 'WHO P3',
            data: whoP3Data,
            borderColor: 'rgba(255, 99, 132, 0.8)',
            backgroundColor: 'transparent',
            borderWidth: 2,
            pointRadius: 0,
            fill: false,
            tension: 0.3
        },
        {
            label: 'WHO P50',
            data: whoP50Data,
            borderColor: 'rgba(54, 162, 235, 0.8)',
            backgroundColor: 'transparent',
            borderWidth: 2,
            pointRadius: 0,
            fill: false,
            tension: 0.3
        },
        {
            label: 'WHO P97',
            data: whoP97Data,
            borderColor: 'rgba(75, 192, 192, 0.8)',
            backgroundColor: 'transparent',
            borderWidth: 2,
            pointRadius: 0,
            fill: false,
            tension: 0.3
        },
        {
            label: 'Data Anak',
            data: userDataPoints,
            borderColor: 'rgba(153, 102, 255, 1)',
            backgroundColor: 'transparent',
            borderWidth: 3,
            pointRadius: 5,
            pointBackgroundColor: 'black',
            pointBorderColor: 'black',
            pointBorderWidth: 1,
            fill: false,
            tension: 0.3
        }
    ];

    if (growthChartInstance) {
        growthChartInstance.data.labels = labels;
        growthChartInstance.data.datasets = datasets;
        growthChartInstance.options.scales.y.title.text = currentChartType === 'berat' ? 'Berat Badan (kg)' : 'Tinggi Badan (cm)';
        growthChartInstance.update();
    } else {
        growthChartInstance = new Chart(growthChartCanvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Usia (Bulan)'
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: currentChartType === 'berat' ? 'Berat Badan (kg)' : 'Tinggi Badan (cm)'
                        },
                        beginAtZero: true,
                        position: 'left'
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            }
        });
    }
}

// Render riwayat data cek
function renderHistory() {
    if (growthRecords.length === 0) {
        dataHistoryList.innerHTML = '<p>Belum ada data riwayat.</p>';
        return;
    }

    const ul = document.createElement('ul');
    growthRecords.forEach((record, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            <div class="data-details">
                <strong>Tanggal:</strong> ${record.checkDate} (Usia: ${record.ageInMonths} bulan)<br>
                <strong>Berat:</strong> ${record.weight} kg,
                <strong>Tinggi:</strong> ${record.height} cm,
                <strong>Lingkar Kepala:</strong> ${record.headCirc ? record.headCirc + ' cm' : '-'},
                <strong>LILA:</strong> ${record.lila ? record.lila + ' cm' : '-'}
            </div>
            <button class="delete-button" data-index="${index}">Hapus</button>
        `;
        ul.appendChild(li);
    });

    dataHistoryList.innerHTML = '';
    dataHistoryList.appendChild(ul);

    // Tambahkan event listener untuk tombol hapus
    dataHistoryList.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', (e) => {
            const indexToDelete = parseInt(e.target.dataset.index);
            deleteRecord(indexToDelete);
        });
    });
}

// Fungsi untuk menghapus catatan
function deleteRecord(index) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        growthRecords.splice(index, 1);
        localStorage.setItem('growthRecords', JSON.stringify(growthRecords));
        renderChart(); // Perbarui grafik setelah menghapus
        renderHistory(); // Perbarui riwayat
        alert('Data berhasil dihapus.');
    }
}

// --- Event Listeners ---

// Simpan Data Anak
childForm.addEventListener('submit', (e) => {
    e.preventDefault();
    childData = {
        fullName: fullNameInput.value,
        dob: dobInput.value
    };
    localStorage.setItem('childData', JSON.stringify(childData));
    alert('Data anak berhasil disimpan!');
    initChildData();
});

// Toggle Grafik Berat/Tinggi
toggleBeratButton.addEventListener('click', () => {
    currentChartType = 'berat';
    toggleBeratButton.classList.add('active');
    toggleTinggiButton.classList.remove('active');
    renderChart();
});

toggleTinggiButton.addEventListener('click', () => {
    currentChartType = 'tinggi';
    toggleTinggiButton.classList.add('active');
    toggleBeratButton.classList.remove('active');
    renderChart();
});

// Navigasi Bulan
prevMonthButton.addEventListener('click', () => {
    currentDisplayMonthOffset = Math.max(0, currentDisplayMonthOffset - 1);
    renderChart();
});

nextMonthButton.addEventListener('click', () => {
    // Batasi navigasi agar tidak melebihi MAX_GROWTH_MONTHS
    // Atau tidak terlalu jauh ke depan jika belum ada data pengguna
    const maxDataMonth = growthRecords.reduce((max, record) => {
        return record.ageInMonths > max ? record.ageInMonths : max;
    }, 0);
    const limitMonth = Math.min(MAX_GROWTH_MONTHS - MAX_MONTHS_DISPLAY, maxDataMonth + MAX_MONTHS_DISPLAY);

    currentDisplayMonthOffset = Math.min(limitMonth, currentDisplayMonthOffset + 1);
    renderChart();
});

// Tambah Data Cek
dataEntryForm.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!childData) {
        alert('Mohon isi data anak terlebih dahulu!');
        return;
    }

    const ageInMonths = calculateAgeInMonths(childData.dob, checkDateInput.value);
    if (ageInMonths === null) {
        alert('Tanggal lahir atau tanggal cek tidak valid.');
        return;
    }

    const newRecord = {
        id: Date.now(), // ID unik untuk setiap catatan
        checkDate: checkDateInput.value,
        weight: parseFloat(weightInput.value),
        height: parseFloat(heightInput.value),
        headCirc: parseFloat(headCircInput.value) || null,
        lila: parseFloat(lilaInput.value) || null,
        ageInMonths: ageInMonths
    };

    growthRecords.push(newRecord);
    // Urutkan data berdasarkan usia bulan, lalu tanggal cek
    growthRecords.sort((a, b) => {
        if (a.ageInMonths !== b.ageInMonths) {
            return a.ageInMonths - b.ageInMonths;
        }
        return new Date(a.checkDate) - new Date(b.checkDate);
    });

    localStorage.setItem('growthRecords', JSON.stringify(growthRecords));
    alert('Data cek berhasil ditambahkan!');
    dataEntryForm.reset(); // Kosongkan form
    renderChart(); // Update grafik
    renderHistory(); // Update riwayat
});

// Inisialisasi aplikasi saat DOM siap
document.addEventListener('DOMContentLoaded', () => {
    initChildData();
    renderChart(); // Pastikan grafik di-render saat pertama kali
    renderHistory(); // Pastikan riwayat di-render saat pertama kali
});