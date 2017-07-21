import cv2
import requests

cap=cv2.VideoCapture(0)
cap.set(cv2.cv.CV_CAP_PROP_FRAME_WIDTH,640)
cap.set(cv2.cv.CV_CAP_PROP_FRAME_HEIGHT,480)
success, original = cap.read()
cv2.imwrite('pic.png',original)
cap.release()
url="http://192.168.1.101/pic.php"
#url="http://localhost/pic.php"
files={'pic': open('pic.png', 'rb')}    
res=requests.post(url=url,files=files)
print res.text
