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
    while True:
        if flag_motor:
            i=0
            GPIO.output(MDIR,1)
            print('zheng zhuan')
            while i<200:
                GPIO.output(MPWM,1)
                sleep(0.005)
                GPIO.output(MPWM,0)
                sleep(0.008)
                i=i+1
        else:
            i=0
            
            GPIO.output(MDIR,0)
            print('fan zhuan')
            while i<200:
                i=i+1
                GPIO.output(MPWM,1)
                sleep(0.005)
                GPIO.output(MPWM,0)
                sleep(0.008)
        #sleep(3)
        GPIO.output(MPWM,0)
        flag_motor= not flag_motor
        sleep(1)
        GPIO.output(MPWM,1)  
except KeyboardInterrupt:
    GPIO.cleanup()
