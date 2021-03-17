//Header File with some random Test Functions
#include <math.h>


float PeriodicFunction(float x, float Period)
{
	float out = sin(2 * M_PI * x / Period);
	return out;
}

float Abs(float input)
{
	if (input < 0)
		input = -input;
		
	return input;
}

float Inverse(float input)
{
	float out = 1/input;
	return out;
}
