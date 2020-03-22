import pyodbc
import dbconfig
import sys

npi = sys.argv[1]

cnxn = pyodbc.connect(dbconfig.cnxnstr)
cursor = cnxn.cursor()
sql = "SELECT P.MasterProviderID,P.ProviderFirstName,P.ProviderLastName,P.ProviderFullName,NPI.NPI"
sql += " FROM factProvider As P"
sql += " JOIN factProviderNPI AS NPI ON NPI.MasterProviderID = P.MasterProviderId AND NPI.CurrentNPI='Y'"
sql += " WHERE NPI.NPI='" + str(npi) + "'"
sql += " Order By P.ProviderLastName, P.ProviderFirstName"

cursor.execute(sql)
rowCount = 0
for row in cursor:
    rowCount += 1
    fieldArray = row
    print (str(fieldArray[0]) + "|" + fieldArray[1] + "|" + fieldArray[2] + "|" + fieldArray[3] + "|" + str(fieldArray[4]) + '~')

if rowCount == 0:
    print (0)
