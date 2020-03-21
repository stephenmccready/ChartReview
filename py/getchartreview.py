import pyodbc
import dbconfig
import sys
chartreviewid = sys.argv[1]
cnxn = pyodbc.connect(dbconfig.cnxnstr)
cursor = cnxn.cursor()
sql = "SELECT CR.*,P.PersonFirstName,P.PersonLastName,P.PersonDateOfBirth,"
sql += "NPI.NPI,PRV.ProviderFullName,CRS.ChartReviewStatus,PRV.ProviderFirstName,PRV.ProviderLastName,"
sql += "L.SourcePersonKey As MemberID,MBI.SourcePersonKey As MBI,HICN.SourcePersonKey As HICN,PRV.MasterProviderId"
sql += " FROM factChartReview AS CR"
sql += " JOIN factPerson AS P ON P.MasterPersonID = CR.MasterPersonId"
sql += " JOIN factProvider AS PRV ON PRV.MasterProviderID = CR.MasterProviderId"
sql += " JOIN factProviderNPI AS NPI ON NPI.MasterProviderID = CR.MasterProviderId AND NPI.CurrentQN='Y'"
sql += " JOIN luChartReviewStatus AS CRS ON CRS.ChartReviewStatusID = CR.ChartReviewStatusID"
sql += " JOIN luPersonXref AS L ON L.MasterPersonID = CR.MasterPersonId AND L.PersonIdTypeCode = 'L' AND L.SystemSourceCode='CT'"
sql += " JOIN luPersonXref AS MBI ON MBI.MasterPersonID = CR.MasterPersonId AND MBI.PersonIdTypeCode = 'B'"
sql += " JOIN luPersonXref AS HICN ON HICN.MasterPersonID = CR.MasterPersonId AND HICN.PersonIdTypeCode = 'R'"
sql += " WHERE CR.ChartReviewID = " + chartreviewid
sql += " ORDER BY CR.dateOfService DESC"
cursor.execute(sql)
#0	[ChartReviewID] [int] IDENTITY(1,1) NOT NULL,
#1	[MasterPersonId] [int] NOT NULL,
#2	[MasterProviderId] [int] NOT NULL,
#3	[dateOfService] [datetime] NOT NULL,
#4	[procedureCode] [varchar](8) NULL,
#5	[procedureCodeType] [char](2) NULL,
#6	[ChartReviewStatusID] [int] NOT NULL,
#7	[dateVoided] [datetime] NULL,
#8	[voidedBy] [varchar](32) NULL,
#9	[RAPSSubmissionFlag] [char](1) NULL,
#10	[EDPSSubmissionFlag] [char](1) NULL,
#11	[dateCreated] [datetime] NOT NULL,
#12	[createdBy] [varchar](32) NOT NULL,
#13	[dateLastUpdated] [datetime] NULL,
#14	[lastUpdatedBy] [varchar](32) NULL,
#15 P.PersonFirstName
#16 P.PersonLastName
#17 P.PersonDateOfBirth
#18 NPI.NPI
#19 PRV.ProviderFullName
#20 CRS.ChartReviewStatus
#21 PRV.ProviderFirstName
#22 PRV.ProviderLastName
#23 MemberID
#24 MBI
#25 HICN
#26 PRV.MasterProviderId
rowCount = 0
output = ""
for row in cursor:
    rowCount += 1
    fieldArray = row
    if fieldArray[6] == 0:
        badgeStatus = 'warning'
        onclick='onclick="editChartReview(' + str(fieldArray[0]) +  ')"'
        lock='<i class="fas fa-notes-medical"></i>'
    elif fieldArray[6] == 1:
        badgeStatus = 'success'
        onclick='onclick="viewChartReview(' + str(fieldArray[0]) +  '),\'Processed\',\'success\'"'
        lock='<i class="fas fa-lock"></i>'
    elif fieldArray[6] == 2:
        badgeStatus = 'danger'
        onclick='onclick="viewChartReview(' + str(fieldArray[0]) +  '),\'Void\',\'danger\'"'
        lock='<i class="fas fa-lock"></i>'
    else:
        badgeStatus = 'danger'
        onclick='onclick="editChartReview(' + str(fieldArray[0]) +  ')"'
        lock='<i class="fas fa-notes-medical"></i>'

	output += str(fieldArray[3].month) + '/' + str(fieldArray[3].day) + '/' + str(fieldArray[3].year) + '|' + fieldArray[15] + '|' + fieldArray[16] + '|'
	output += str(fieldArray[17].month) + '/' + str(fieldArray[17].day) + '/' + str(fieldArray[17].year) + '|'
    output += fieldArray[23] + '|' + fieldArray[24] + '|' + fieldArray[25] + '|'
    output += fieldArray[20] + '|' + fieldArray[19] + '|' + fieldArray[18] + '|'
    output += str(fieldArray[1]) + '|' + str(chartreviewid) + '|' + fieldArray[4] + '|' + str(fieldArray[26]) + '||'
    
if rowCount == 0:
    print 0
else:
    cnxn2 = pyodbc.connect(sandboxconfig.sandboxcnxnstr)
    cursor2 = cnxn2.cursor()
    sql2 = "SELECT ChartReviewDiagnosisID,DiagnosisCode,HCC_Code FROM factChartReviewDiagnosis Where ChartReviewID=" + str(chartreviewid)
    cursor2.execute(sql2)  
    for row2 in cursor2:
        fieldArray2 = row2
        output += '|' + str(fieldArray2[0]) + '|' + str(fieldArray2[1]) + '|' + str(fieldArray2[2])
    print output
