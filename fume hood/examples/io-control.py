import RPi.GPIO as GPIO
from time import sleep
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(37,GPIO.OUT)
while True:
    GPIO.output(37,1)
    #sleep(0.1)
    #GPIO.output(16,0)
    #sleep(0.1)
    #print('sssss')
    
