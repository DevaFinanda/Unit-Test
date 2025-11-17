"""
Calculator Application - Interactive Mode
Run the calculator with a user-friendly interface
"""

from calculator import Calculator

def print_menu():
    """Display calculator menu"""
    print("\n" + "="*50)
    print("🧮 CALCULATOR APPLICATION")
    print("="*50)
    print("1. ➕ Addition (Penjumlahan)")
    print("2. ➖ Subtraction (Pengurangan)")
    print("3. ✖️  Multiplication (Perkalian)")
    print("4. ➗ Division (Pembagian)")
    print("5. 🔢 Power (Pangkat)")
    print("6. √  Square Root (Akar Kuadrat)")
    print("7. 📝 Show History (Lihat Riwayat)")
    print("8. 🗑️  Clear History (Hapus Riwayat)")
    print("9. ❌ Exit (Keluar)")
    print("="*50)

def get_number(prompt):
    """Get number input from user"""
    while True:
        try:
            return float(input(prompt))
        except ValueError:
            print("❌ Error: Please enter a valid number!")

def main():
    """Main application loop"""
    calc = Calculator()
    
    print("\n🎉 Welcome to Calculator Application!")
    print("Created by: Deva")
    
    while True:
        print_menu()
        choice = input("\nPilih operasi (1-9): ").strip()
        
        try:
            if choice == '1':
                # Addition
                a = get_number("Masukkan angka pertama: ")
                b = get_number("Masukkan angka kedua: ")
                result = calc.add(a, b)
                print(f"\n✅ Hasil: {a} + {b} = {result}")
                
            elif choice == '2':
                # Subtraction
                a = get_number("Masukkan angka pertama: ")
                b = get_number("Masukkan angka kedua: ")
                result = calc.subtract(a, b)
                print(f"\n✅ Hasil: {a} - {b} = {result}")
                
            elif choice == '3':
                # Multiplication
                a = get_number("Masukkan angka pertama: ")
                b = get_number("Masukkan angka kedua: ")
                result = calc.multiply(a, b)
                print(f"\n✅ Hasil: {a} × {b} = {result}")
                
            elif choice == '4':
                # Division
                a = get_number("Masukkan angka pembilang: ")
                b = get_number("Masukkan angka penyebut: ")
                try:
                    result = calc.divide(a, b)
                    print(f"\n✅ Hasil: {a} ÷ {b} = {result}")
                except ValueError as e:
                    print(f"\n❌ Error: {e}")
                    
            elif choice == '5':
                # Power
                base = get_number("Masukkan bilangan pokok (base): ")
                exp = get_number("Masukkan pangkat (exponent): ")
                result = calc.power(base, exp)
                print(f"\n✅ Hasil: {base}^{exp} = {result}")
                
            elif choice == '6':
                # Square Root
                num = get_number("Masukkan angka: ")
                try:
                    result = calc.square_root(num)
                    print(f"\n✅ Hasil: √{num} = {result}")
                except ValueError as e:
                    print(f"\n❌ Error: {e}")
                    
            elif choice == '7':
                # Show History
                history = calc.get_history()
                print("\n📝 RIWAYAT PERHITUNGAN:")
                print("="*50)
                if len(history) == 0:
                    print("Tidak ada riwayat (history kosong)")
                else:
                    for i, record in enumerate(history, 1):
                        print(f"{i}. {record}")
                print("="*50)
                
            elif choice == '8':
                # Clear History
                calc.clear_history()
                print("\n✅ Riwayat berhasil dihapus!")
                
            elif choice == '9':
                # Exit
                print("\n👋 Terima kasih telah menggunakan Calculator!")
                print("Dibuat oleh: Deva")
                print("Project: Unit Testing Calculator\n")
                break
                
            else:
                print("\n❌ Pilihan tidak valid! Silakan pilih 1-9.")
                
        except KeyboardInterrupt:
            print("\n\n👋 Program dihentikan. Terima kasih!")
            break
        except Exception as e:
            print(f"\n❌ Error tidak terduga: {e}")
        
        # Pause before showing menu again
        input("\nTekan Enter untuk melanjutkan...")

if __name__ == "__main__":
    main()
