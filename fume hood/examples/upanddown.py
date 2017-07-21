import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(3,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(5,GPIO.IN)
MBREAK=31
MPWM=32
MDIR=33
flag_motor=True
GPIO.setup(MBREAK,GPIO.OUT)
GPIO.setup(MPWM,GPIO.OUT)
GPIO.setup(MDIR,GPIO.OUT)
GPIO.output(MBREAK,0)
GPIO.output(MPWM,0)

def checkdist():
    GPIO.output(3,1)
    time.sleep(0.000015)
    GPIO.output(3,GPIO.LOW)
    while not GPIO.input(5):
        pass
    t1=time.time()
    while GPIO.input(5):
        pass
    t2=time.time()
    return (t2-t1)*170*100
def runmotor(mdir):
    GPIO.output(MDIR,mdir)
    GPIO.output(MPWM,1)
    time.sleep(0.005)
    GPIO.output(MPWM,0)
    time.sleep(0.0010)
def stopmotor():
    GPIO.output(MPWM,0)
    GPIO.output(MPWM,0)
    GPIO.output(MPWM,0)

try:
    while True:
        H=checkdist() 
        print('Distence: %0.1f cm' %H)
        if H<40:
            runmotor(1)
        else:
            stopmotor()
except KeyboardInterrupt:
    GPIO.cleanup()
