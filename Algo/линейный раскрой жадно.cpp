#include <iostream>
#include <math.h>
using namespace std;
float maxsootn = 0;	
float sootn[101];
long indexsootn = 0;
void findmin(int n)
{
	for (long i = 1; i<=n; i++) 
	{
		//sootn[i] = C[i]/A[i];
		if (sootn[i] > maxsootn)
		{
			maxsootn=sootn[i];
			indexsootn = i;
		}
	}
	sootn[indexsootn] = 0;
}
int main() 
{ 	
	long mass[101][10001];
	long L;
	long n;
	freopen("input.txt","r",stdin); 
		freopen("output.txt","w",stdout); 

	float C[101];
	float A[101];
	float mini = 1001;
	long stol = 1;
	long str = 1;
	
	cin >> n ;
	long good = 0;
		long good1 = 0;

	cin >> L;
	float free=L;
 	//freopen("output.txt","w",stdout); 
	for (long i = 1; i<=n; i++)
	{
		cin >> A[i];
		if (mini>A[i])
		{
			mini = A[i];
		}
	}
	for (long i = 1; i<=n; i++)
	{
		cin >> C[i];
		sootn[i] = C[i]/A[i];
	}
	
	
		
		while(free>mini)
		{
			findmin(n);
		good = floor(free / A[indexsootn]);
		free =free - A[indexsootn] * good;
		good1 += C[indexsootn] * good;
			//cout<<mini;

		}
	cout<<good1;
return 0; 
}