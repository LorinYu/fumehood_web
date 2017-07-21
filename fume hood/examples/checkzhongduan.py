import RPi.GPIO as GPIO
import time,threading
Speed=16
speed=0
sspeed=0
def checkspeed(self):
        global speed
        speed=speed+1
        time.sleep(0.00005)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Speed,GPIO.IN,pull_up_down=GPIO.PUD_UP)

print("waiting 1 seconds")
time.sleep(1)
try:   
    GPIO.add_event_detect(Speed,GPIO.FALLING,callback=checkspeed)
    while True:
            speed=0
            time.sleep(1)
            sspeed=speed
            print("found zhong duan %d" %sspeed)
except KeyboardInterrupt:
    GPIO.cleanup() 



    
