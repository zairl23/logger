<?php

namespace Ney\Log\Tests;

use Ney\Logger\Log\FileLog;
use PHPUnit\Framework\TestCase;

class FileLogTest extends TestCase
{
   public function testRead()
   {
      $logger  = new FileLog(__DIR__ . '/test');

      return $logger->read(function($filename, $content){
        $this->assertEquals(__DIR__ . '/test', $filename);
        $this->assertEquals("test\ntest\n", $content);
      });
   }

   public function testWrite()
   {
     $logger  = new FileLog(__DIR__ . '/test_write');

     return $logger->read(function($filename, $content) use ($logger){
       return $logger->write('write_test', function($filename) use ($content, $logger){
         $content .= 'write_test';

         return  $logger->read(function($filename, $con) use ($content){
           $this->assertEquals($content, $con);
         });
       });
     });
   }
}
