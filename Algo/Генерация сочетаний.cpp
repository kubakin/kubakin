#include <iostream>
using namespace std;
void print(int *mass, int k)
{
  for (int i = 0; i < k; i++) {
          cout << mass[i];
          cout << " ";
        }
         cout << "\n";

}
int main() 
{
  freopen("input.txt", "r", stdin);
  freopen("output.txt", "w", stdout);
 
  int n, k, *mass;
  cin >> n;
  cin >> k;
  bool flag = true;
  mass = new int[n];
  for (int i = 0; i < n; i++)
  {
    mass[i] = i + 1;
  }

  for (int i = 0; i < k; i++)
  {
    cout << mass[i];
    cout << " ";
  }
  cout << "\n";
    while (flag == true)
    {
      flag = false;
        for (int i = k-1; i >= 0; i--) 
          {
            if (mass[i] < n - k + i + 1) 
            {
            mass[i]++;
            for (int j = i + 1; j <= k; j++) 
              {
                mass[j] = mass[j - 1] + 1;
              }
              flag = true;
              print(mass, k); 
              break;
            }   
          }
  }
  return 0;
}