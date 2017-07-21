import RPi.GPIO as GPIO
import time,threading
Zero=15
Speed=16
Traic=22
Trig=3
Echo=5
count=0
scount=0
ncount=0
speed=0
sspeed=0
pwm=0
ssspeed=0
i=100
NH=0
PH=0
flag_tens=False
kp=0.40
#ki=0.11
#kd=0.08
ki=0
kd=0
uk=0
Addpwm=0
uksp1=0
uksp2=0
ek1=0
ek2=0
ek=0
ss=0
t=0
flag_H=0
def checkdist():
    GPIO.output(3,1)
    time.sleep(0.000015)
    GPIO.output(3,GPIO.LOW)
    while not GPIO.input(5):
        pass
    t1=time.time()
    while GPIO.input(5):
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
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Zero,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Speed,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Traic,GPIO.OUT)
GPIO.setup(Trig,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(Echo,GPIO.IN)
def PID():
        global kp,kd,ki,ek,ek1,ek2,i,Addpwm,Add
        Addpwm=kp*(ek-ek1)+ki*ek+kd*(ek-2*ek1+ek2)
        #print('Addpwm=%0.1f'%Addpwm)
        Add=round(Addpwm)
        print('Add=%0.1f \n'%Add)
        i=i+Add
        if i<0:
            i=0
        if i>50:
            i=50
        #print(' Come to PID ')
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
def tensec():
        global flag_tens
        print('start 10s ji shi')
        while True:
            time.sleep(20)
            flag_tens=True
            
try:
    #GPIO.output(Traic,1)     
    GPIO.add_event_detect(Zero,GPIO.FALLING,callback=checkzero)
    GPIO.add_event_detect(Speed,GPIO.FALLING,callback=checkspeed)
    th6_Zhuan=threading.Thread(target=Zhuansu,args=())
    th6_Zhuan.start()
    th6_Zhuan.join
    i=31
    print('kp=%0.2f'%kp)
    print('ki=%0.2f'%ki)
    print('kd=%0.2f'%kd)
    t=time.time()
    while True:
           MS(i)
           #GPIO.output(Traic,1)
           #PH=NH
           NH=checkdist()
           print('highth=%0.1f'%NH)
           if flag_H==1:
               Standard=427.68*NH/100
           else:
               Standard=235
           print('Standard=%0.1f'%Standard)
           uksp2=uksp1
           uksp1=uk
           uk=ss
           ek2=Standard-uksp2
           ek1=Standard-uksp1
           #print('uk=%d'%uk)
           ek=Standard-uk
           if ((ek>4)or(-ek>4)) and ((time.time()-t)>9):
               PID()
               flag_H=1
           else:
               pass
           print('pwm=%d'%i)
except KeyboardInterrupt:
    GPIO.cleanup() 



    
