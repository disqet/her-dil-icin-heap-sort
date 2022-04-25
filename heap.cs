using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OmerNKayhanHeapSort
{
    class Program
    {
        static int[] dizi = {5, 63, 23, 24, 2, 58, 2, 6};
        public static void heapSirala(int diziBoyutu)
        {
            for (int i = Convert.ToInt32(diziBoyutu / 2); i >= 0; i--)
            {
                heap(diziBoyutu - 1, i);
            }

            for (int i = diziBoyutu - 1; i >= 0; i--)
            {

                //Maksimum Heap yapısına göre son yaprakla kökü değiştir
                int gecici = dizi[i];
                dizi[i] = dizi[0];
                dizi[0] = gecici;

                //Son yaprağı diziden çıkararak tekrar Heap metodu ile sırala
                heap(i - 1, 0);

            }
        }

        // Heap metodu maksimum heap yapısına göre sıralamayı gerçekleştirir
        public static void heap(int diziBoyutu, int index)
        {

            int maksimum = index;
            int solYaprak = 2 * index + 1;
            int sagYaprak = 2 * index + 2;

            //Sol yapraktaki sayı kökten büyükse maksimumu değiştir
            if (solYaprak <= diziBoyutu && dizi[solYaprak] > dizi[maksimum])
            {
                maksimum = solYaprak;
            }

            //Sağ yapraktaki sayı kökten büyükse maksimumu değiştir
            if (sagYaprak <= diziBoyutu && dizi[sagYaprak] > dizi[maksimum])
            {
                maksimum = sagYaprak;
            }

            if (maksimum != index)
            { //maksimum kök değilse

                int gecici = dizi[index];
                dizi[index] = dizi[maksimum];
                dizi[maksimum] = gecici;

                //Yer değiştirme işlemi gerçekleştiği için tekrar Heap ile sırala
                heap(diziBoyutu, maksimum);

            }

        }

        static void Main(string[] args)
        {
            heapSirala(dizi.Length);
            Console.WriteLine("[{0}]", string.Join(", ", dizi));
            Console.ReadKey();
        }
    }
}
