let dizi = [5, 63, 23, 24, 2, 58, 2, 6];

function heapSirala(diziBoyutu){
    for(let i = parseInt(diziBoyutu / 2); i >= 0; i--){
        heap(diziBoyutu - 1, i);
    }

    for(let i = diziBoyutu - 1; i >= 0; i--){

        //Maksimum Heap yapısına göre son yaprakla kökü değiştir
        const gecici = dizi[i];
        dizi[i] = dizi[0];
        dizi[0] = gecici;

        //Son yaprağı diziden çıkararak tekrar Heap metodu ile sırala
        heap(i - 1, 0);

    }
}

function heap(diziBoyutu, index){

    let maksimum = index;
    const solYaprak = 2 * index + 1;
    const sagYaprak = 2 * index + 2;

    //Sol yapraktaki sayı kökten büyükse maksimumu değiştir
    if(solYaprak <= diziBoyutu && dizi[solYaprak] > dizi[maksimum]) {
        maksimum = solYaprak;
    }

    //Sağ yapraktaki sayı kökten büyükse maksimumu değiştir
    if(sagYaprak <= diziBoyutu && dizi[sagYaprak] > dizi[maksimum]) {
        maksimum = sagYaprak;
    }

    if(maksimum != index) { //maksimum kök değilse

        const gecici = dizi[index];
        dizi[index] = dizi[maksimum];
        dizi[maksimum] = gecici;

        //Yer değiştirme işlemi gerçekleştiği için tekrar Heap ile sırala
        heap(diziBoyutu, maksimum);

    }

}

heapSirala(dizi.length);
console.log(dizi);
