import pyodbc
import dbconfig
import sys
filteryear = sys.argv[1]
filtermonth = sys.argv[2]
filterstatus = sys.argv[3]
cnxn = pyodbc.connect(dbconfig.cnxnstr)
cursor = cnxn.cursor()
sql = "SELECT CR.*,P.PersonFirstName,P.PersonLastName,P.PersonDateOfBirth,"
sql += "NPI.NPI,PRV.ProviderFullName,CRS.ChartReviewStatus,PRV.ProviderFirstName,PRV.ProviderLastName"
sql += " FROM factChartReview AS CR"
sql += " JOIN factPerson AS P ON P.MasterPersonID = CR.MasterPersonId"
sql += " JOIN factProvider AS PRV ON PRV.MasterProviderID = CR.MasterProviderId"
sql += " JOIN factProviderNPI AS NPI ON NPI.MasterProviderID = CR.MasterProviderId AND NPI.CurrentQN='Y'"
sql += " JOIN luChartReviewStatus AS CRS ON CRS.ChartReviewStatusID = CR.ChartReviewStatusID"
sql += " WHERE Year(CR.dateOfService) = " + filteryear
sql += " AND ('" + filtermonth + "' = 'All' OR Month(CR.dateOfService) = '" + filtermonth + "')"
sql += " AND ('" + filterstatus + "' = 'All' OR CR.ChartReviewStatusID = '" + filterstatus + "')"
sql += " ORDER BY CR.dateOfService DESC, CR.ChartReviewID DESC"
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
rowCount = 0
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

    print '<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ' + onclick + '>'
    print '<span class="crID">' + str(fieldArray[0]) + '</span>'
    print '<span class="crDate">' + str(fieldArray[3].month) + '/' + str(fieldArray[3].day) + '/' + str(fieldArray[3].year) + '</span>'
    print '<span class="crName">' + fieldArray[15] + ' ' + fieldArray[16] + '</span>'
    print '<span class="crProv">' + fieldArray[21] + ' ' + fieldArray[22] + '</span>'
    print '<span class="badge badge-pill badge-' + badgeStatus + '">' + lock + '&nbsp;' + fieldArray[20] + '</span></a>'

if rowCount == 0:
    print (0)
