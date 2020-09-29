import matplotlib.pyplot as plt
import matplotlib.dates as dates
import time
from datetime import datetime,date
file = open('data.txt')
str1 = eval(file.read())
data = str1[1335]['data']
print(len(data))
e=10
mass=[]
u=-9999
l=9999
metrika=0
squar=0
#mass.append(data[0])
#lastx = data[0]
print(mass)
base = data[0]
last = data[0]
uslope = 0
last = -99999999
lslope = 0
base[0]
for x in data:
    if (last != -99999999):
        if(uslope == 0 and lslope == 0):
            lslope = (x[1] - base[1] + e) / (x[0] - base[0])
            uslope = (x[1] - base[1] - e) / (x[0] - base[0])
        else:
            newlslope=(x[1] - base[1] + e) / (x[0] - base[0])
            k=x[1] - base[1] - e
            j=x[0]-base[0]
            newuslope=(x[1] - base[1] - e) / (x[0] - base[0])
            if(newlslope < lslope):
                lslope = newlslope
            if(newuslope > uslope):
                uslope = newlslope
            if(lslope < uslope):
                mass.append(last)
                lslope =0
                uslope =0
                base = last
        last =x
        # #base = x
        # if (x[1] > u):
        #     u=x[1]
        #     if (x[1] - base[1] + e != 0 or x[0] - base[0] !=0):
        #         uslope=(x[1] - base[1] + e)/(x[0] - base[0])
        # if(x[1] < l):
        #     l=x[1]
        #     if (x[1] - base[1] - e != 0):
        #         lslope = (x[1] - base[1] - e) / (x[0] - base[0])
        # if(uslope < lslope):
        #     base = last
        #     mass.append(base)
    else:
        base = x
        mass.append(x)
        last = x
for x in mass:
    for i in data:
        if(x[0] == i[0]):
            squar = (x[1]-i[1]) * (x[1]-i[1])
            metrika =metrika + squar
            break
if(metrika == 0):
    print('seems good')
#print(file)
#mass.append(last)
print(len(mass))
plt.plot([datetime(time.localtime(x[0]/1000).tm_year, time.localtime(x[0] / 1000).tm_mon, time.localtime(x[0] / 1000).tm_mday, time.localtime(x[0] / 1000).tm_hour, time.localtime(x[0] / 1000).tm_min) for x in mass], [x[1] for x in mass])
#plt.plot(str[1335]['data'], color = 'red', marker = '^', linestyle = '--', linewidth = 2, markersize = 5)
plt.show()