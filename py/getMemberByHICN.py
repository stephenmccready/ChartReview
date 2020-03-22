import pyodbc
import dbconfig
import sys
hicn = sys.argv[1]

cnxn = pyodbc.connect(dbconfig.sandboxcnxnstr)
cursor = cnxn.cursor()
sql = "SELECT P.MasterPersonID,P.MasterPersonID,P.PersonFirstName,P.PersonLastName,P.PersonDateOfBirth,M.SourcePersonKey As MemberID,MBI.SourcePersonKey As MBI,HICN.SourcePersonKey As HICN"
sql += " FROM factPerson As P"
sql += " JOIN luPersonXref As M on M.MasterPersonID = P.MasterPersonId And M.PersonIDTypeCode = 'L' And M.SystemSourceCode = 'CT'"
sql += " JOIN luPersonXref As MBI on MBI.MasterPersonID = P.MasterPersonId And MBI.PersonIDTypeCode = 'B'"
sql += " JOIN luPersonXref As HICN on HICN.MasterPersonID = P.MasterPersonId And HICN.PersonIDTypeCode = 'R'"
sql += " WHERE HICN.SourcePersonKey='" + str(hicn) + "'"

cursor.execute(sql)
rowCount = 0
for row in cursor:
    rowCount += 1
    fieldArray = row
    print (str(fieldArray[0]) + "|" + str(fieldArray[1]) + "|" + str(fieldArray[2]) + "|" + str(fieldArray[3]) + "|" + str(fieldArray[4]) + "|" + str(fieldArray[5]) + "|" + str(fieldArray[6]) + "|" + str(fieldArray[7]))

if rowCount == 0:
    print (0)
