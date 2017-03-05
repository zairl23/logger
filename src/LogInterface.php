<?php

namespace Ney\Logger;

interface LogInterface {

  public function write();

  public function read($file, $cb);

  public function notify();

  public function delete();

}
