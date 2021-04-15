<?php 
use PHPUnit\Framework\TestCase; 
    
class GeeksPhpunitTestCase extends TestCase 
{ 
    public function testPositiveForassertTrue()
          
    {  
     $assertvalue = true;
        // Assert function to test whether assert
        // value is true or not
        $this->assertTrue(
            $assertvalue,
            "assert value is true or not"
        );
          
    }
 } 
?> 
