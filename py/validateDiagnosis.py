import pyodbc
import dbconfig
import sys

diag = sys.argv[1]

cnxn = pyodbc.connect(dbconfig.cnxnstr)
cursor = cnxn.cursor()
sql = "SELECT DiagnosisDescr FROM luDiagnosisCode Where DiagnosisCode='" + str(diag) + "'"

cursor.execute(sql)
rowCount = 0
for row in cursor:
    rowCount += 1
    fieldArray = row
    if(fieldArray[0]=='?' or fieldArray[0]=='??'):
        print ("0|Unknown diagnosis description")
    else:
        print ("1|" + str(fieldArray[0]))

if rowCount == 0:
    print ("0|Unknown diagnosis code")
