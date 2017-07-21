import MySQLdb
conn = MySQLdb.connect(host = '192.168.1.108',                                             user = 'root',   # MySQL用户名db = 'project1',   
passwd = 'root',port = 3306,charset = "utf8")  
cursor = conn.cursor()  
cursor.excute("insert into data (gate_height) values (66)")
cursor.close()
conn.close()  
