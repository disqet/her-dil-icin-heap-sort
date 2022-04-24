function heapsort(&$Array, $n) {
  for($i = (int)($n/2); $i >= 0; $i--) {
    heapify($Array, $n-1, $i);
  }
  
  for($i = $n - 1; $i >= 0; $i--) {
    //swap last element of the max-heap with the first element
    $temp = $Array[$i];
    $Array[$i] = $Array[0];
    $Array[0] = $temp;

    //exclude the last element from the heap and rebuild the heap 
    heapify($Array, $i-1, 0);
  }
}

// heapify function is used to build the max heap
// max heap has maximum element at the root which means
// first element of the array will be maximum in max heap
function heapify(&$Array, $n, $i) {
  $max = $i;
  $left = 2*$i + 1;
  $right = 2*$i + 2;

  //if the left element is greater than root
  if($left <= $n && $Array[$left] > $Array[$max]) {
    $max = $left;
  }

  //if the right element is greater than root
  if($right <= $n && $Array[$right] > $Array[$max]) {
    $max = $right;
  }

  //if the max is not i
  if($max != $i) {
    $temp = $Array[$i];
    $Array[$i] = $Array[$max];
    $Array[$max] = $temp;
    //Recursively heapify the affected sub-tree
    heapify($Array, $n, $max); 
  }
}
