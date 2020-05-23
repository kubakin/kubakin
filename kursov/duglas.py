import matplotlib.pyplot as plt
import matplotlib.dates as dates
import time
from datetime import datetime,date
file = open('data.txt')
str1 = eval(file.read())
data = str1[1335]['data']
e=10
mass=[]
mass.append(data[0])
lastx = data[0]
dotx= -9999
doty= 9999
limitx = data[0][1] + e
limity = data[0][1] - e
print(mass)
for x in data:
    if(dotx < x[1]):
        dotx = x[1]
        if(dotx > limitx):
            mass.append(save)
            limitx = dotx + e
            limity = dotx - e
            doty = x[1]
            continue
        continue
    if (doty > x[1]):
        doty = x[1]
        if (doty < limity):
            mass.append(save)
            limitx = doty + e
            limity = doty - e
            dotx = x[1]
            continue
        continue
    save = x
#print(file)
print(mass)
plt.plot([datetime(time.localtime(x[0]/1000).tm_year, time.localtime(x[0] / 1000).tm_mon, time.localtime(x[0] / 1000).tm_mday, time.localtime(x[0] / 1000).tm_hour, time.localtime(x[0] / 1000).tm_min) for x in mass], [x[1] for x in mass])
#plt.plot(str[1335]['data'], color = 'red', marker = '^', linestyle = '--', linewidth = 2, markersize = 5)
plt.show()