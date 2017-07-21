import RPi.GPIO as GPIO
from time import sleep
MBREAK=31
MPWM=32
MDIR=33
i=0
flag_motor=True
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(MBREAK,GPIO.OUT)
GPIO.setup(MPWM,GPIO.OUT)
GPIO.setup(MDIR,GPIO.OUT)
GPIO.output(MBREAK,0)
GPIO.output(MPWM,1)
try:
            i=0
            GPIO.output(MDIR,0)
            print('zheng zhuan')
            while i<500:
                GPIO.output(MPWM,1)
                sleep(0.005)
                GPIO.output(MPWM,0)
                sleep(0.008)
                i=i+1
            GPIO.output(MPWM,0)
except KeyboardInterrupt:
    GPIO.cleanup()
