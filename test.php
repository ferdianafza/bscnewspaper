<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
// Mengatur kunci API CoinMarketCap Anda
$apiKey = 'bc3cfbd0-a635-4d91-bb90-1835e0569363';

// Fungsi untuk mengambil harga crypto dari CoinMarketCap
function getCryptoPrice($symbol) {
    global $apiKey;
    
    $url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest";
    $parameters = [
        'symbol' => $symbol
    ];

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: ' . $apiKey
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . '?' . http_build_query($parameters));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    // Ambil harga dari data yang diterima
    if (isset($data['data'][$symbol]['quote']['USD']['price'])) {
        $price = $data['data'][$symbol]['quote']['USD']['price'];
        return $price;
    } else {
        return false;
    }
}

// Contoh penggunaan: Mendapatkan harga Bitcoin (BTC)
$bitcoinPrice = getCryptoPrice('BTC');
$bnbPrice = getCryptoPrice('BNB');
$ethPrice = getCryptoPrice('ETH');
$xlmPrice = getCryptoPrice('XLM');
$dogePrice = getCryptoPrice('DOGE');
$trxPrice = getCryptoPrice('TRX');

if ($bitcoinPrice !== false) {
    echo "Harga Bitcoin (BTC): $" . $bitcoinPrice;
    echo "Harga Bitcoin (BTC): $" . $bnbPrice;
    echo "Harga Bitcoin (BTC): $" . $ethPrice;
    echo "Harga Bitcoin (BTC): $" . $xlmPrice;
    echo "Harga Bitcoin (BTC): $" . $dogePrice;
    echo "Harga Bitcoin (BTC): $" . $trxPrice;
} else {
    echo "Gagal mengambil harga Bitcoin (BTC).";
}
?>
</body>
</html>