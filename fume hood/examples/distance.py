import RPi.GPIO as GPIO
import time
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
def avedist():
    dist1=checkdist()
    time.sleep(0.20)
    dist2=checkdist()
    time.sleep(0.2)
    dist3=checkdist()
    time.sleep(0.2)
    dist4=checkdist()
    time.sleep(0.2)
    dist5=checkdist()
    time.sleep(0.2)
    return (dist1+dist2+dist3+dist4+dist5)/5
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(3,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(5,GPIO.IN)


time.sleep(2)
try:
    while True:
        t3=time.time()
        #print('Distence: %0.1f cm' %checkdist() )
        H=checkdist() 
        print('Distence: %0.1f cm' %H)
        t4=time.time()
        print('Time %0.5fs' %(t4-t3))
        time.sleep(0.05)
except KeyboardInterrupt:
        GPIO.cleanup()
    


    
