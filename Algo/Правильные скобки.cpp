#include <iostream>
using namespace std;
int main() 
{
	freopen("input.txt", "r", stdin);
    freopen("output.txt", "w", stdout);
    int n;
	cin >> n;
	string s;	
	int depth = 0;
	for (int j = 0; j<n*2; j++)	
	{
		if(j<n)
		{
			s = s + '(';
			continue;
		}
		
		s = s + ')';
	}
	cout << s << "\n";
	int flag = 0;
	string ans;
	n = n*2;
	while(1) 
	{
		flag = 1;
		for (int i=n-1, depth=0; i>=0; --i)
		 {
			if (s[i] == '(')
				--depth;
			else
				++depth;
			if (s[i] == '(' && depth > 0)
			{
				--depth;
				int open = (n-i-1 - depth) / 2;
				int close = n-i-1 - open;
				ans = s.substr(0,i) + ')' + string (open, '(') + string (close, ')');
				flag = 0;
				break;	
			}
		}
		if (flag == 1)
		{
			break;
		}
		s = ans;
		cout << ans << "\n";
	}
}