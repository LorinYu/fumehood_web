import RPi.GPIO as GPIO
import time 
import threading
flag_time=False
def dingshi():
   while True:
        global flag_time
        time.sleep(1)
        flag_time=True
        print('It is over')
def task1():
   while True:
        global flag_time
        if flag_time:
             flag_time=False 
             print('1s passed') 
thread1=threading.Thread(target=dingshi,args=())
thread2=threading.Thread(target=task1,args=())
thread1.start()
thread2.start()
thread1.join
thread2.join

time.sleep(2)

#GPIO.setmode(GPIO.BOARD)
#GPIO.setwarnings(False)
#GPIO.setup(37,GPIO.OUT)
#while True:
#    GPIO.output(37,1)
    #sleep(0.1)
    #GPIO.output(16,0)
    #sleep(0.1)
    #print('sssss')
    
