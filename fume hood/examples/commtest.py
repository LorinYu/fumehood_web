import serial
import time
import sys
yuju1="SPG(0);\r\n"
d=time.strftime('%Y-%m-%d %H:%M:%S',time.localtime())
distime=time.strftime('%Y-%m-%d %H:%M:%S',time.localtime())
def showlabl(x1,y1,x2,strs):
    a1='LABL(32,'+str(x1)+','+str(y1)+','+str(x2)+",'"
    a2="',3,2);"
    a3='\r\n'
    return a1+str(strs)+a2+a3
#print(showlabl(1,1,1,d))
labl2="LABL(32,186,86,325,'200',3,2);\r\n"
ser=serial.Serial("/dev/ttyUSB0",9600,timeout=0.5)
if ser.isOpen==False:
    ser.open()
print("serial open")
ss=showlabl(1,1,320,d)
print(labl2)
print(ss)
#ser.write(yuju1.encode('utf-8'))
sss=showlabl(186,129,326,51)
#ser.write(sss.encode('utf-8'))
H=56
ser.write(showlabl(186,129,326,H).encode('utf-8'))
print(sss)              
try:
        #ser.write(b"SPG(0);\r\n")
        #ser.write(b"CLS(1);\r\n")
        ser.write(ss.encode('utf-8'))
        #shang yi ge shi dui de
        #ser.write(labl2.encode('utf-8'))
        #ser.write(yuju1.encode('utf-8'))
        print('over')
        time.sleep(0.3)
except KeyboardInterrupt:
        ser.close()
