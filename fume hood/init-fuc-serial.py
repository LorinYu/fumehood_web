# -*- coding:gb18030 -*-
# -*- coding:utf-8 -*-
import serial
import time
import sys

def gettime():
    nowtime=time.strftime('%Y-%m-%d %H:%M:%S',time.localtime())
    return nowtime
ser=serial.Serial("/dev/ttyUSB0",9600,timeout=0.5)
if ser.isOpen==False:
    ser.open()
def showlabl(x1,y1,x2,strs):
    a1='LABL(32,'+str(x1)+','+str(y1)+','+str(x2)+",'"
    a2="',3,2);"
    a3='\r\n'
    return a1+str(strs)+a2+a3

ser.write(b"SPG(0);\r\n")
shiyan="实验"
guancha="观察"
#ser.write(showlabl(188,210,325,guancha).encode('gb2312'))
try:
    while True:
            ss=showlabl(1,1,380,gettime())
            chang=ser.inWaiting()
            if chang >6:
                print('size=%d'%chang)
                data=ser.read(chang)
                print("data=%s"%data)
                ser.flushInput()
                if chang==8:
                    i=4
                else:
                    i=8
                print(data[i])
                if data[i]=='2':
                    print("love")
                #ser.write(labl2.encode('utf-8'))
                #3ser.write(ss.encode('utf-8'))
                #ser.write(showlabl(186,129,326,str(50)).encode('utf-8'))
                #ser.write(yuju1.encode('utf-8'))
                #ser.write(b"SPG(0);\r\n")
                time.sleep(0.3)
except KeyboardInterrupt:
        ser.close()
