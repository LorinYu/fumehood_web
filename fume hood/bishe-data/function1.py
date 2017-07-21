import RPi.GPIO as GPIO
import time
import threading
Alarm=13
MBREAK=31
MPWM=32
MDIR=33
TRIG=3
ECHO=5
CPEOPLE=12
Alarm=37
Led=36
flag_bottom=True
Bottom=29
countpeople=0
prestatus=0
nowstatus=0
flag_window=0
H=0
SHH=50
SHL=20
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(MBREAK,GPIO.OUT)
GPIO.setup(MPWM,GPIO.OUT)
GPIO.setup(MDIR,GPIO.OUT)
GPIO.setup(TRIG,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(ECHO,GPIO.IN)
GPIO.setup(Alarm,GPIO.OUT)
GPIO.setup(Led,GPIO.OUT)
GPIO.setup(Alarm,GPIO.OUT)
GPIO.setup(CPEOPLE,GPIO.IN,pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(Bottom,GPIO.IN,pull_up_down=GPIO.PUD_UP)
def Alarm(x):
        if x:
            GPIO.output(Alarm,1)
            GPIO.output(Led,1)
        else:
            GPIO.output(Alarm,0)
            GPIO.output(Led,0)
def checkbottom(self):
        global flag_bottom
        flag_bottom=False
def runmotor(mdir):
    GPIO.output(MDIR,mdir)
    GPIO.output(MBREAK,0)
    GPIO.output(MPWM,1)
    time.sleep(0.005)
    GPIO.output(MPWM,0)
    time.sleep(0.008)
def stopmotor():
    GPIO.output(MPWM,0)
    GPIO.output(MBREAK,1)
def checkpeople(self):
        global countpeople
        countpeople=countpeople+1
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
def Onedist():
    global H
    while True:
        time.sleep(1)
        H=checkdist()
        print('Now distence is %0.1f cm'%H)  
def CheckMode():
    global nowstatus,prestatus,flag_window,countpeople
    GPIO.add_event_detect(CPEOPLE,GPIO.FALLING,callback=checkpeople)
    while True:
        time.sleep(5)
        prestatus=nowstatus 
        if countpeople>2:
            nowstatus=1
        else:
            nowstatus=0
        countpeople=0
        if prestatus==nowstatus:
            flag_window=0  
            if nowstatus==1:
                print('Still have people')
            else:
                print('Still no people')
        else:
            if prestatus>nowstatus:
                print('change to no-people')
                flag_window=1
            else:
                print('change to have-people')
                flag_window=2

def upanddown():
    global flag_window,flag_bottom,SHL,SHH
    GPIO.add_event_detect(Bottom,GPIO.FALLING,callback=checkbottom)
    while True:
        if not flag_bottom:
            if checkdist()>SHL:
                while checkdist()>SHL:
                    runmotor(0)
                    Alarm(1)
                stopmotor()
                Alarm(0)
            if checkdist()<SHL:
                while checkdist()<SHL:
                    runmotor(1)
                    Alarm(1)
                stopmotor()
                Alarm(0)
        if flag_window==1:
            if checkdist()>SHL:
                while checkdist()>SHL:
                    runmotor(0)
                stopmotor()
            if checkdist()<SHL:
                while checkdist()<SHL:
                    runmotor(1)
                stopmotor()
        if flag_window==2:
            if checkdist()>SHH:
                while checkdist()>SHH:
                    runmotor(0)
                stopmotor()
            if checkdist()<SHH:
                while checkdist()<SHH:
                    runmotor(1)
                stopmotor()


try:
    
    th1_checkmode=threading.Thread(target=CheckMode,args=())
    th2_onedist=threading.Thread(target=Onedist,args=())
    th3_upanddown=threading.Thread(target=upanddown,args=())
    th1_checkmode.start()
    print("start check-people")
    th2_onedist.start()
    th3_upanddown.start() 
    th1_checkmode.join
    th2_onedist.join
    th3_upanddown.join
    print("Let's begin")
except KeyboardInterrupt:
        GPIO.cleanup()
