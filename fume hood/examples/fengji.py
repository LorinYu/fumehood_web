import RPi.GPIO as GPIO
import time
pwm=35
count=0
scount=0
def Baifenbi():
        if count<pwm*2:
            GPIO.output(36,0)
        else:
            GPIO.output(36,1)
def checkzero(self):
        global count
        count=count+1
        if count>=100:
            count=0
            print('100 zero-points')
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(37,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(36,GPIO.OUT)
GPIO.output(36,1)
print("waiting 1 seconds")
time.sleep(1)
try:
    GPIO.add_event_detect(37,GPIO.FALLING,callback=checkzero)
    while True:
       # time.sleep(1)
       # scount=count
       # count=0
       # print("found zero %d" %scount)
       Baifenbi() 
except KeyboardInterrupt:
    GPIO.cleanup()



    
