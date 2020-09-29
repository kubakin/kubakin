import matplotlib.pyplot as plt
import matplotlib.dates as dates
import time
from datetime import datetime,date
import math
file = open('data.txt')
str1 = eval(file.read())
data = str1[1335]['data']
print(len(data))
ostatok = data
maxIndex=0
e=8
start = data[0]
last = data[len(data)-1]
mass=[]
mass.append(start)
pivot=0
maxRaznica = 0
def duglas(start, last, test, pivot=0):
    counter = 0
    # for x in data[2:4]:
    #     print(x)
    # raznica = (start[1] + last[1]) / 2
    maxRaznica = 0
    for x in test:
        if(x == last):
            break
        #a = abs(raznica - x[1])
        a=abs((last[1]-start[1])*x[0]-(last[0]-start[0])*x[1] + last[0]*start[1]-last[1]*start[0]) / math.sqrt(pow((last[0]-start[0]),2)+pow((last[1]-start[1]),2))
        counter = counter + 1
        if a >= maxRaznica:
            maxRaznica = a
            maxIndex = x
            maxIndexCounter = counter
    if maxRaznica <= e:
        if(maxIndex != data[len(data)-1]):
            #duglas(maxIndex, data[len(data)-1])
            maxIndexCounter = maxIndexCounter+1
            return last
        return
    else:
        #x = [x for x in data(1,3)]
        ost1 = duglas(start, maxIndex, test[:maxIndexCounter+1],pivot)
        if ost1 == None:
            return
        mass.append(ost1)
        #mass.append(ost2)
        if len(data) < 2:
            return
        pivot =  pivot +maxIndexCounter-1
        duglas(maxIndex, data[len(data) - 1], data[pivot:],pivot)
    #return ostatok, maxIndex, last
duglas(start,last, data)
mass.append(last)
# for x in data:
#     a = abs(raznica - x[1])
#     if a > maxRaznica:
#         maxRaznica = a
#         maxIndex = x[0]
print(len(mass))
plt.plot([datetime(time.localtime(x[0]/1000).tm_year, time.localtime(x[0] / 1000).tm_mon, time.localtime(x[0] / 1000).tm_mday, time.localtime(x[0] / 1000).tm_hour, time.localtime(x[0] / 1000).tm_min) for x in mass], [x[1] for x in mass])
#plt.plot(str[1335]['data'], color = 'red', marker = '^', linestyle = '--', linewidth = 2, markersize = 5)
plt.show()