import RPi.GPIO as GPIO
import time
count=0
def checkzero(self):
        global count
        count=count+1
        if count==100:
            count=0
        print("found zero %d" %count)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(37,GPIO.IN,pull_up_down=GPIO.PUD_UP)
print("waiting 2 seconds")
time.sleep(2)



try:
    GPIO.add_event_detect(37,GPIO.FALLING,callback=checkzero)
    while True:
        time.sleep(0.1)
        #print("found zero %d" %count)
except KeyboardInterrupt:
    GPIO.cleanup()



    
