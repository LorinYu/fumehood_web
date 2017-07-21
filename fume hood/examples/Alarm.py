import RPi.GPIO as GPIO
from time import sleep
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
Alarm=37
Led=36
GPIO.setup(Led,GPIO.OUT)
GPIO.setup(Alarm,GPIO.OUT)
try:
    while True:
        GPIO.output(Alarm,1)
        GPIO.output(Led,1)
    #sleep(0.1)
    #GPIO.output(16,0)
    #sleep(0.1)
    #print('sssss')
except KeyboardInterrupt:
    GPIO.cleanup()  
