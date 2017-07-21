import RPi.GPIO as GPIO
import time,threading
Traic=22
t1=0

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Traic,GPIO.OUT)
print("waiting 1 seconds")
time.sleep(1)
try:
    GPIO.output(Traic,1)
    t1=100/100
    while True:
        GPIO.output(Traic,0)
        time.sleep(t1)
        GPIO.output(Traic,1)
        time.sleep(1-t1)
        
except KeyboardInterrupt:
    GPIO.cleanup() 



    
