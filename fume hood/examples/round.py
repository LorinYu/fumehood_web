import RPi.GPIO as GPIO
from time import sleep
a=-1.4
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(37,GPIO.OUT)
while True:
    GPIO.output(37,1)
    sleep(2)
    print('a=%0.1f'%a)
    b=(int)(a)
    print('b=%0.1f'%b)
    c=round(a)
    print('c=%0.1f'%c)
    #sleep(0.1)
    #GPIO.output(16,0)
    #sleep(0.1)
    #print('sssss')
    
