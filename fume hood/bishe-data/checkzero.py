import RPi.GPIO as GPIO
import time
count=0
scount=0
def checkzero(self):
        global count
        count=count+1
        time.sleep(0.00005)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(37,GPIO.IN,pull_up_down=GPIO.PUD_UP)
print("waiting 1 seconds")
time.sleep(1)
try:
    GPIO.add_event_detect(37,GPIO.FALLING,callback=checkzero)
    while True:
        time.sleep(1)
        scount=count
        count=0
        print("found zero %d" %scount)
        
except KeyboardInterrupt:
    GPIO.cleanup()



    
