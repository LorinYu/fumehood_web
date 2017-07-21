import RPi.GPIO as GPIO
import time,threading
Zero=15
Speed=16
Traic=18
pwm=50
countzero=0
countspeed=0
speedofsec=0
flag_onesecond=False
def Onesecond():
        global flag_onesecond
        while True:
                time.sleep(1)
                flag_onesecond=True
def Baifenbi():
        global countzero,pwm
        while True:
            if countzero<pwm*2:
                GPIO.output(Traic,0)
            else:
                GPIO.output(Traic,1)
def checkspeed(self):
        global countspeed
        countspeed=countspeed+1
def checkzero(self):
        global countzero
        countzero=countzero+1
        time.sleep(0.00005)
        #if countzero>=100:
         #   countzero=0
          #  print('  100 zero-points  ')
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Zero,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Speed,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(Traic,GPIO.OUT)
GPIO.output(Traic,1)
print("waiting 1 seconds")
time.sleep(1)
try:
    GPIO.add_event_detect(Zero,GPIO.FALLING,callback=checkzero)
    GPIO.add_event_detect(Speed,GPIO.FALLING,callback=checkspeed)
    th4_Onesec=threading.Thread(target=Onesecond,args=())
    th5_Bai=threading.Thread(target=Baifenbi,args=())
    th4_Onesec.start()
    #th5_Bai.start()
    th4_Onesec.join
    #th5_Bai.join
    while True:
        #Baifenbi()
        if flag_onesecond:
                print('zero=%d'%countzero)
                print("in one second countspeed=%d" %countspeed)
                speedofsec=countspeed
                print("in one second speedofsec=%d" %speedofsec)
                countspeed=0
                flag_onesecond=False
except KeyboardInterrupt:
    GPIO.cleanup()



    
