import './bootstrap';

// Ambil elemen-elemen yang diperlukan
const typeSelect = document.getElementById('type');
const categorySelect = document.getElementById('category');
const categoryOptions = document.getElementById('category-options');

// Daftar kategori berdasarkan tipe transaksi
const categoryOptionsByType = {
    income: [
        'wage',
        'bonus',
        'gift',
    ],
    expense: [
        'food & drinks',
        'shopping',
        'charity',
        'housing',
        'insurance',
        'taxes',
        'transportation',
    ],
};

// Fungsi untuk mengubah pilihan kategori
function updateCategoryOptions() {
    const selectedType = typeSelect.value;
    const categories = categoryOptionsByType[selectedType] || [];

    // Hapus semua opsi kategori yang ada
    categorySelect.innerHTML = '';

    // Tambahkan opsi-opsi kategori baru
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        categorySelect.appendChild(option);
    });
}

// Tambahkan event listener untuk memantau perubahan pada tipe transaksi
typeSelect.addEventListener('change', updateCategoryOptions);

// Pemanggilan awal untuk menginisialisasi pilihan kategori
updateCategoryOptions();
