<?php 
assert_options(ASSERT_BAIL, true);
assert(1==1);
print("should run");
assert(1==2);
print("shouldn't run");
?> 
