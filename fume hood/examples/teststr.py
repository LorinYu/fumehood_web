import time

d=time.strftime('%Y-%m-%d %H:%M:%S',time.localtime())
labl_1='"'+"LABL(32,93,50,473,'"
labl_2="',3,2);"
labl_3=r"\r\n"+'"'
#print(labl_1+d+labl_2+labl_3)
def showlabl(x1,y1,x2,strs):
    a1='"LABL(32,'+str(x1)+','+str(y1)+','+str(x2)+",'"
    a2="',3,2);"
    a3=r'\r\n"'
    return a1+str(strs)+a2+a3
#print(showlabl(1,1,1,d))
def editcom(strs):
     a1='"'
     
     a3=r'\r\n"'
shiyan="实验"
guancha="观察"
print(shiyan)
print(guancha)
