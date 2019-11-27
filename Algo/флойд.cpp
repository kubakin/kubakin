#include <iostream>
using namespace std;
int main() 
{ 
	long n,m,k1[100002],k2[100002], a[200][200];
	freopen("input.txt","r",stdin); 
	cin >> n;
	cin >> m ;
	long min = -2147483648;
	long max = -1001;
	for(long i=1;i<=n;i++)
	{ 
		for(long j=1;j<=n;j++)
		{ 

			cin >> a[i][j];
			if (a[i][j] == -1001)
			{
				a[i][j] = min;
			} 
		}
	} 
	freopen("output.txt","w",stdout); 
	for(long i=1;i<=m;i++)
	{ 
		cin >> k1[i];
		cin >> k2[i]; 
	} 
	for(long i=1;i<=n;i++)
	{ 
		for(long j=1;j<=n;j++)
		{ 
			for(long k=1;k<=n;k++)
			{ 
				if((j != k) && (a[j][i] != min) && (a[i][k] != min))
					{ 
						if(a[j][k] == min) {
							a[j][k] = a[j][i]+a[i][k]; 
						//	if (a[j][k] == -1001)
						//		a[j][k] = 12345678;
						}
						else 
						if(a[j][i]+a[i][k] < a[j][k]) {
							a[j][k] = a[j][i]+a[i][k];
						//	if (a[j][k] == -1001)
						//		a[j][k] = 12345678;
						}
					}
			}
		}
	} 
				for(long i=1;i<=m;i++) 
				{ 
					if((a[k1[i]][k2[i]])!=min) {
						cout << a[k1[i]][k2[i]];
						cout << "\n";
			//		continue;
					}
				//	if (a[k1[i]][k2[i]]== 12345678)
				//	{
				//		cout << -1001;
				//		cout << "\n";
				//		continue;
				//	}
					else
					{
					printf("No path\n");
					} 
				}
return 0; 
}