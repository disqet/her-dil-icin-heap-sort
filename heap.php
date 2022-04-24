
function heapSirala(&$dizi, $diziBoyutu) {
    for($i = (int)($diziBoyutu/2); $i >= 0; $i--) {
        heap($dizi, $diziBoyutu-1, $i);
    }

    for($i = $diziBoyutu - 1; $i >= 0; $i--) {
        //Maksimum Heap yapısına göre son yaprakla kökü değiştir
        $gecici = $dizi[$i];
        $dizi[$i] = $dizi[0];
        $dizi[0] = $gecici;

        //Son yaprağı diziden çıkararak tekrar Heap metodu ile sırala
        heap($dizi, $i-1, 0);
    }
}

// Heap metodu maksimum heap yapısına göre sıralamayı gerçekleştirir
function heap(&$dizi, $diziBoyutu, $i) {

    $maksimum = $i;
    $solYaprak = 2 * $i + 1;
    $sagYaprak = 2 * $i + 2;

    //Sol yapraktaki sayı kökten büyükse maksimumu değiştir
    if($solYaprak <= $diziBoyutu && $dizi[$solYaprak] > $dizi[$maksimum]) {
        $maksimum = $solYaprak;
    }

    //Sağ yapraktaki sayı kökten büyükse maksimumu değiştir
    if($sagYaprak <= $diziBoyutu && $dizi[$sagYaprak] > $dizi[$maksimum]) {
        $maksimum = $sagYaprak;
    }
    
    if($maksimum != $i) { //maksimum kök değilse

        $gecici = $dizi[$i];
        $dizi[$i] = $dizi[$maksimum];
        $dizi[$maksimum] = $gecici;

        //Yer değiştirme işlemi gerçekleştiği için tekrar Heap ile sırala
        heapify($dizi, $diziBoyutu, $maksimum); 

    }
}
