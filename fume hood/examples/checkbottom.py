import RPi.GPIO as GPIO
import time
flag_bottom=True
Bottom=29
bottomcount=0
def checkbottom(self):
        global flag_bottom
        flag_bottom=False
        #print('Touch the bottom')
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(Bottom,GPIO.IN,pull_up_down=GPIO.PUD_UP)
print("begin checking the bottom_key")
try:
    GPIO.add_event_detect(29,GPIO.FALLING,callback=checkbottom)
    while True:
        if not flag_bottom:
                bottomcount=bottomcount+1
                print('%d times' %bottomcount)
                flag_bottom=True
        time.sleep(0.5)
except KeyboardInterrupt:
    GPIO.cleanup()



    
