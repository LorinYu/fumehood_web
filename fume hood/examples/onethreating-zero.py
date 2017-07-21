import RPi.GPIO as GPIO
import time 
import threading
flag_time=False
def dingshi():
   while True:
        global flag_time
        time.sleep(1)
        flag_time=True
        print('1s passed  ')

thread1=threading.Thread(target=dingshi,args=())

count=0
scount=0
def checkzero(self):
        global count
        count=count+1
        #time.sleep(0.000005)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(37,GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.add_event_detect(37,GPIO.FALLING,callback=checkzero)


thread1.start()
thread1.join
while True:
   while flag_time:
      scount=count
      count=0
      print('wow,%d'%scount)
      flag_time=False
#GPIO.setmode(GPIO.BOARD)
#GPIO.setwarnings(False)
#GPIO.setup(37,GPIO.OUT)
#while True:
#    GPIO.output(37,1)
    #sleep(0.1)
    #GPIO.output(16,0)
    #sleep(0.1)
    #print('sssss')
    
