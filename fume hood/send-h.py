import RPi.GPIO as GPIO
import time
import requests
def checkdist():
    GPIO.output(5,1)
    time.sleep(0.000015)
    GPIO.output(5,GPIO.LOW)
    while not GPIO.input(3):
        pass
    t1=time.time()
    while GPIO.input(3):
        pass
    t2=time.time()
    x=(t2-t1)*170*100
    #print('x=%0.1f ' %x)
    return x
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(5,GPIO.OUT,initial=GPIO.LOW)
GPIO.setup(3,GPIO.IN)
url="http://192.168.1.108/project1/remote_monitor.php"
time.sleep(2)

try:
    while True:
        time.sleep(1)
        H=checkdist() 
        data={'machine_id':2,'wind_speed':H}
        res=requests.post(url=url,data=data)
        print('H=%0.1f cm'%H)
except KeyboardInterrupt:
        GPIO.cleanup()
    


    
