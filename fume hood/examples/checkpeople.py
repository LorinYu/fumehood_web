import RPi.GPIO as GPIO
import time
count=0
prestatus=0
nowstatus=0
flag_window=0
def checkpeople(self):
        global count
        count=count+1
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(12,GPIO.IN,pull_up_down=GPIO.PUD_DOWN)
print("start check-people")
time.sleep(1)
try:
    GPIO.add_event_detect(12,GPIO.FALLING,callback=checkpeople)
    while True:
        time.sleep(5)
        prestatus=nowstatus 
        if count>0:
            nowstatus=1
        else:
            nowstatus=0
        count=0
        if prestatus==nowstatus:
            flag_window=0  
            if nowstatus==1:
                print('Still have people')
            else:
                print('Still no people')
        else:
            if prestatus>nowstatus:
                print('change to no-people')
                flag_window=1
            else:
                print('change to have-people')
                flag_window=2
except KeyboardInterrupt:
    GPIO.cleanup()
