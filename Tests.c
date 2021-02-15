#include <stdio.h>
#include <assert.h>
#include "Math_Functions.h"

main()
{
	assert(PeriodicFunction(1, 1) >= PeriodicFunction(2, 1)-pow(10,-15) && PeriodicFunction(1,1) <= PeriodicFunction(2,1) + pow(10,-15));	//Checks to make sure that the period is 1 (within a range of 10^-15
	
	assert(Abs(-1) == 1.0 && Abs(1) == 1.0);	// checks to make sure a negative input is positive and positive input is also positive
	
	assert(Inverse(1) == 1 && Inverse(2) == 0.5);
	
	return 0;
}
