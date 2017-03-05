<?php

namespace Ney\Logger\Log;

class FileLog {

  public function __construct($file)
  {
    $this->file = $file;
  }

  public function write($content, $cb)
  {
    return \Swoole\Async::write($this->file, $content, -1, $cb);
  }

  public function read($cb)
  {
    return \Swoole\Async::readfile($this->file, $cb);
  }

  public function notify()
  {
    # code...
  }

  public function delete()
  {
    # code...
  }


}
