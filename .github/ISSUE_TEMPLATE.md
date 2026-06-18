## Deskripsi Fitur
Fitur ini bertujuan untuk menambahkan fungsionalitas penyaringan (filtering) data item berdasarkan `category_id` pada endpoint API `GET /api/v1/items`. Jika parameter `category_id` diberikan, sistem hanya akan mengembalikan item yang sesuai dengan kategori tersebut. Jika tidak diberikan, sistem akan menampilkan semua data item seperti biasa.

## Langkah Implementasi
- [ ] Membuat branch baru `feature/item-filter` dari branch `main`
- [ ] Memperbarui logika pada method `index()` di dalam `ItemController.php` untuk mendukung query parameter `category_id`
- [ ] Memastikan response wrapper yang dikembalikan tetap konsisten dalam format JSON
- [ ] Melakukan pengujian 3 skenario API di Postman (tanpa parameter, parameter valid, dan parameter kosong)
- [ ] Memperbarui dokumentasi API pada file `docs/api.md`
- [ ] Melakukan commit dan push ke GitHub repository