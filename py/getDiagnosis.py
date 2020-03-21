import pyodbc
import dbconfig
import sys
diag = sys.argv[1]
i = sys.argv[2]
planyear = sys.argv[3]
cnxn = pyodbc.connect(dbconfig.cnxnstr)
cursor = cnxn.cursor()
sql = "Declare @HCCVersion Int, @HCCRecordType As char(1);"
sql += " Set @HCCVersion = (SELECT Max(HCCid) FROM Genesis.dbo.luHCCVersion);"
sql += " Set @HCCRecordType = (SELECT Max(H.HCCRecordType)"
sql += " FROM RiskScore.dbo.luDiagnosisHCCXref AS X"
sql += " LEFT OUTER JOIN Genesis.dbo.luHCC As H"
sql += " ON H.SourceHCCCode Is Not Null"
sql += " AND Try_Convert(Int, H.SourceHCCCode) Is Not Null"
sql += " AND Cast(H.SourceHCCCode As Int) = X.HCCid"
sql += " AND H.HCCId = @HCCVersion"
sql += " WHERE X.DiagnosisCodeDecimal = " + str(diag)
sql += " AND X.PlanYear = '" + str(planyear) + "');"
sql += " SELECT Dx.DiagnosisCode,Dx.DiagnosisDescr,X.HCCid,H.HCCDescr"
sql += " FROM Genesis.dbo.luDiagnosisCode AS Dx "
sql += " LEFT OUTER JOIN RiskScore.dbo.luDiagnosisHCCXref AS X "
sql += " ON X.DiagnosisCodeDecimal = Dx.DiagnosisCode AND X.PlanYear='" + str(planyear) + "' "
sql += " LEFT OUTER JOIN Genesis.dbo.luHCC As H"
sql += " ON H.SourceHCCCode Is Not Null"
sql += " AND Try_Convert(Int, H.SourceHCCCode) Is Not Null"
sql += " AND Cast(H.SourceHCCCode As Int) = X.HCCid"
sql += " AND H.HCCId = @HCCVersion"
sql += " AND H.HCCRecordType = @HCCRecordType"
sql += " WHERE Dx.DiagnosisCode = " + str(diag)

cursor.execute(sql)
rowCount = 0
for row in cursor:
    rowCount += 1
    fieldArray = row
    print str(fieldArray[0]) + "|" + fieldArray[1] + "|" + str(i) + "|" + str(fieldArray[2]) + "|" + fieldArray[3]

if rowCount == 0:
    print str(diag) + "|Unknown diagnosis code||" + str(i)
