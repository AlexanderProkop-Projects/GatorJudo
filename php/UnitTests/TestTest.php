<php?
public function testBasicTest()
{
    $this->assertTrue(True);
}

public function testUserCreation()
{
    $user = new User([
        'name' => "Test User",
        'email' => "test@mail.com",
        'password' => bcrypt("testpassword")
    ]);   

    $this->assertEquals('Test User', $user->name);
}


testBasicTest();
testUserCreation();

?>
