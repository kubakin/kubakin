#include <iostream>
using namespace std;
int main() 
{ 	
	long mass[101][10001];
	long L;
	long n;
	freopen("input.txt","r",stdin); 
	long C[101];
	long A[101];
	long stol = 1;
	long str = 1;
	long max = 0;
	cin >> n ;
	cin >> L;
 	freopen("output.txt","w",stdout); 
	for (long i = 1; i<=n; i++)
	{
		cin >> A[i];
	}
	for (long i = 1; i<=n; i++)
	{
		cin >> C[i];
	}
	for (stol = 1; stol<=n; stol++) 
	{
		for (str = 1; str<=L; str++)
		{
			if(A[stol]<=str)
			{
				if (mass[stol-1][str] >= C[stol] + mass[stol][str-A[stol]])
					mass[stol][str] = mass[stol-1][str];
				else
					mass[stol][str] = C[stol] + mass[stol][str-A[stol]];
			}

			else 
			{
				mass[stol][str] = mass[stol-1][str];
			}
			
		}	
	}
	cout << mass[n][L];
return 0; 
}