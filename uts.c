#include <stdio.h>

// Fungsi penjumlahan
int tambah(int a, int b) {
    return a + b;
}

// Fungsi perkalian
int kali(int a, int b) {
    return a * b;
}

// Fungsi menampilkan menu
void tampilkanMenu() {
    printf("=== Kalkulator Sederhana ===\n");
    printf("1. Tambah\n");
    printf("2. Kali\n");
    printf("Pilih (1/2): ");
}

int main() {
    int pilihan, x, y, hasil;

    tampilkanMenu();
    scanf("%d", &pilihan);

    printf("Masukkan dua angka: ");
    scanf("%d %d", &x, &y);

    if (pilihan == 1) {
        hasil = tambah(x, y);
        printf("Hasil penjumlahan: %d\n", hasil);
    } else if (pilihan == 2) {
        hasil = kali(x, y);
        printf("Hasil perkalian: %d\n", hasil);
    } else {
        printf("Pilihan tidak valid.\n");
    }

    return 0;
}