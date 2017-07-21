import RPi.GPIO as GPIO
import time
count=0
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(37,GPIO.IN,pull_up_down=GPIO.PUD_UP)
print("waiting 2 seconds")
time.sleep(2)
try:
    while True:
        GPIO.wait_for_edge(37,GPIO.FALLING) 
        count=count+1
        print('found zero-point %d' %count )
except KeyboardInterrupt:
        GPIO.cleanup()
    


    
