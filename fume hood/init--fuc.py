import RPi.GPIO as GPIO
import time
import threading
MBREAK=31
MPWM=32
MDIR=33
TRIG=5
ECHO=3
CPEOPLE=12
Zero=15
Speed=16
Traic=22

countpeople=0
prestatus=0
nowstatus=0
flag_window=0
H=0
count=0
scount=0
ncount=0
speed=0
sspeed=0
pwm=0
ssspeed=0
SHH=50
SHL=20
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(MBREAK,GPIO.OUT)
GPIO.setup(MPWM,GPIO.OUT)
GPIO.setup(MDIR,GPIO.OUT)
GPIO.setup(TRIG,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(ECHO,GPIO.IN)
#GPIO.setup(Alarm,GPIO.OUT)
#GPIO.setup(Led,GPIO.OUT)
#GPIO.setup(Alarm,GPIO.OUT)
GPIO.setup(Zero,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Speed,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Traic,GPIO.OUT)
#GPIO.setup(CPEOPLE,GPIO.IN,pull_up_down=GPIO.PUD_DOWN)
#GPIO.setup(Bottom,GPIO.IN,pull_up_down=GPIO.PUD_UP)


GPIO.output(Traic,1)
def runmotor(mdir):
    GPIO.output(MDIR,mdir)
    GPIO.output(MBREAK,0)
    GPIO.output(MPWM,1)
    time.sleep(0.005)
    GPIO.output(MPWM,0)
    time.sleep(0.008)
    
def stopmotor():
    print('ok')
    GPIO.output(MPWM,0)
    GPIO.output(MBREAK,1)

def checkdist():
    GPIO.output(TRIG,1)
    time.sleep(0.000015)
    GPIO.output(TRIG,0)
    while not GPIO.input(ECHO):
        pass
    t1=time.time()
    while GPIO.input(ECHO):
        pass
    t2=time.time()
    return (t2-t1)*170*100
def checkzero(self):
        global count
        count=count+1
        #time.sleep(0.00005)
def checkspeed(self):
        global speed
        speed=speed+1
        #time.sleep(0.00005)
def MS(x):
        t=(x*2)/100
        GPIO.output(Traic,1)
        time.sleep(1-t)
        GPIO.output(Traic,0)
        time.sleep(t)
def Zhuansu():
        global scount,count,sspeed,speed,ssspeed,ncount,ss
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
            #print("found zero %d" %sn)
            print(" speed = %d" %ss)
try:
    GPIO.add_event_detect(Zero,GPIO.FALLING,callback=checkzero)
    GPIO.add_event_detect(Speed,GPIO.FALLING,callback=checkspeed)
    th6_Zhuan=threading.Thread(target=Zhuansu,args=())
    #th6_Zhuan.start()
    #th6_Zhuan.join

    GPIO.output(MBREAK,0)
    print('height=%0.1f cm'%checkdist())
    while checkdist()<50:
          GPIO.output(MDIR,1)
          GPIO.output(MPWM,0)
          time.sleep(0.010)
          GPIO.output(MPWM,1)
          time.sleep(0.005)  
    print('height=%0.1f cm'%checkdist())
    GPIO.output(MBREAK,1)
    stopmotor()
    while True:
        MS(29)
        
        
    
except KeyboardInterrupt:
        GPIO.cleanup()
