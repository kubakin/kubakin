#include <iostream>
#include <string>
using namespace std;
int main() 
{
	long len =0;
	long count = 0;
	long j = 0;
	string test1;
	long t = 0;
	int flag = 0;
	long zap = 0;
	string n;
	string test[101];
	freopen("console.in","r",stdin); 
 	freopen("console.out","w",stdout); 
	getline(cin, n);
	long k = stoi(n);

	for (long s = 0 ; s< k; s++)
	{
		getline(cin, test[s]);
	}

	while(getline(cin, test1))
	{
		flag = 0;
		
		for (long i=0; i< test1.length(); i++)
		{
			
			for(long s = 0; s<k; s++)
			{

				if (test[s].length() > test1.length())
				{
					continue;
				}

				int razn = test1.length() - test[s].length();
				j = 0;

				while(j<test[s].length())
					{
						if (razn > test1.length() - j + 3)
					{
						break;
					}
					if(test[s][j] != test1[i+ zap])
						{
							count = 0;
							zap = 0;
							//j++;
							break;
						}
						j++;
						zap++;
						count++;
					}
					if(count >= test[s].length())
						{
							if (flag == 1)
						{
						continue;
					}
					cout<<test1;
					cout << "\n";
					flag = 1;
				}
				j = 0;
				count = 0;
						
			}	
		}
					
	
	//t++;
	}
	
return 0; 
}