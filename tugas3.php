<?php
// Array awal
$arrString = ['bunga mawar','bunga melati','bunga kembang sepatu', 'bunga tulip'];

// 1. is_array()
if (is_array($arrString)) {
    echo "Variabel adalah array\n\n";
} else {
    echo "Variabel bukan array\n\n";
}

// 2. count()
$jumlah = count($arrString);
echo "Jumlah data: $jumlah\n\n";

// 3. sort() (mengurutkan array)
sort($arrString);
echo "Array setelah di-sort:\n";
foreach ($arrString as $bunga) {
    echo "- $bunga\n";
}
echo "\n";

// 4. shuffle() (mengacak array)
shuffle($arrString);
echo "Array setelah di-shuffle:\n";
foreach ($arrString as $bunga) {
    echo "- $bunga\n";
}
echo "\n";
?>