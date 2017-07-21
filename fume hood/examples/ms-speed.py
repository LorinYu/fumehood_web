import RPi.GPIO as GPIO
import time,threading
Zero=15
Speed=16
Traic=22
count=0
scount=0
ncount=0
speed=0
sspeed=0
pwm=50
ssspeed=0
i=100
flag_tens=False
def checkzero(self):
        global count
        count=count+1
        #time.sleep(0.00005)
def checkspeed(self):
        global speed
        speed=speed+1
        #time.sleep(0.00005)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Zero,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Speed,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Traic,GPIO.OUT)
def Baifenbi():
        global count,pwm
        while True:
            if count<100:
                GPIO.output(Traic,0)
            else:
                GPIO.output(Traic,1)
def MS(x):
        t=x/100
        GPIO.output(Traic,1)
        time.sleep(1-t)
        GPIO.output(Traic,0)
        time.sleep(t)
def Zhuansu():
        global scount,count,sspeed,speed,ssspeed,ncount
        while True:
            scount=count
            sspeed=speed
            time.sleep(1)
            ncount=count
            ssspeed=speed
            count=0
            speed=0
            sn=ncount-scount
            ss=ssspeed-sspeed
            print("found zero %d" %sn)
            print("found zhong duan %d" %ss)
def tensec():
        global flag_tens
        print('start 10s ji shi')
        while True:
            time.sleep(20)
            flag_tens=True
print("waiting 1 seconds")
time.sleep(1)
try:
    GPIO.output(Traic,0)     
    GPIO.add_event_detect(Zero,GPIO.FALLING,callback=checkzero)
    GPIO.add_event_detect(Speed,GPIO.FALLING,callback=checkspeed)
    #th5_Bai=threading.Thread(target=Baifenbi,args=())
    th6_Zhuan=threading.Thread(target=Zhuansu,args=())
    #th5_Bai.start()
    #th5_Bai.join
    th7_Tensec=threading.Thread(target=tensec,args=())
    th6_Zhuan.start()
    th6_Zhuan.join
    th7_Tensec.start()
    th7_Tensec.join
    while True:
            
           MS(i)
           print('pwm=%d'%i)
           if flag_tens:
                 i=i-2
                 if i<0:
                        i=100
                 flag_tens=False
        #Baifenbi()
except KeyboardInterrupt:
    GPIO.cleanup() 



    
