import MySQLdb

db = MySQLdb.connect(host="localhost",
    user="root", passwd="123456", db="mcbobo")
cursor = db.cursor()

cursor.execute("SELECT * FROM user")

results = cursor.fetchall()
print(results)
