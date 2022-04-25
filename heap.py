# -*- coding: cp1254 -*-
dizi = [5, 63, 23, 24, 2, 58, 2, 6]

def heapSirala(diziBoyutu):
    
    for x in range(diziBoyutu // 2, -1, -1):
        heap(diziBoyutu - 1, x)

    for x in range(diziBoyutu - 1, -1, -1):
        
        #Maksimum Heap yapısına göre son yaprakla kökü değiştir
        dizi[x], dizi[0] = dizi[0], dizi[x]
        
        #Son yaprağı diziden çıkararak tekrar Heap metodu ile sırala
        heap(x - 1, 0)

#Heap metodu maksimum heap yapısına göre sıralamayı gerçekleştirir
def heap(diziBoyutu, index):

    maksimum = index
    solYaprak = 2 * index + 1
    sagYaprak = 2 * index + 2

    #Sol yapraktaki sayı kökten büyükse maksimumu değiştir
    if solYaprak <= diziBoyutu and dizi[solYaprak] > dizi[maksimum]:
        maksimum = solYaprak

    #Sağ yapraktaki sayı kökten büyükse maksimumu değiştir
    if sagYaprak <= diziBoyutu and dizi[sagYaprak] > dizi[maksimum]:
        maksimum = sagYaprak

    #Maksimum kök değilse
    if maksimum != index:
        dizi[index], dizi[maksimum] = dizi[maksimum], dizi[index]

        #Yer değiştirme işlemi gerçekleştiği için tekrar Heap ile sırala
        heap(diziBoyutu, maksimum);

heapSirala(len(dizi))
print(dizi)
