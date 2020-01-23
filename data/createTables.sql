-- MySQL
Create Table factChartReview (
	ChartReviewID			int NOT NULL AUTO_INCREMENT
,	MasterPersonId			int not null
,	MasterProviderId		int not null
,	dateOfService			datetime not null
,	procedureCode			varChar(8) null	
,	procedureCodeType		char(2) null	
,	ChartReviewStatusID		int not null
,	dateVoided				datetime null
,	voidedBy				varChar(32) null	
,	RAPSSubmissionFlag		char(1) null
,	EDPSSubmissionFlag		char(1) null
,	dateCreated				datetime not null
,	createdBy				varChar(32) not null
,	dateLastUpdated			datetime null
,	lastUpdatedBy			varChar(32) null
, PRIMARY KEY (ChartReviewID)
)

Create Table factChartReviewDiagnosis (
	ChartReviewDiagnosisID	int NOT NULL AUTO_INCREMENT
,	ChartReviewID			int not null
,	DiagnosisCode			char(7) not null
,	DiagnosisCodeType		char(2) not null
,	HCC_Code				char(5) null
,	dateCreated				datetime not null
,	createdBy				varChar(32) null
,	dateLastUpdated			datetime null
,	lastUpdatedBy			varChar(32) null
, PRIMARY KEY (ChartReviewDiagnosisID)
)

Create Table factPerson (
	ID	int NOT NULL AUTO_INCREMENT
,	MasterPersonID			int not null
,	PersonFirstName			char(30) not null
,	PersonLastName			char(30) not null
,	PersonDateOfBirth		datetime not null
, 	PRIMARY KEY (ID)
);

Create Table luPersonXref (
	ID	int NOT NULL AUTO_INCREMENT
,	MasterPersonID			int not null
,	SourcePersonKey			char(12) not null
,	SystemSourceCode		char(2) not null
,	PersonTypeCode			char(1) not null
,	DateCreated				datetime not null
, 	PRIMARY KEY (ID)
);

Create Table luChartReviewStatus (
	ID	int NOT NULL AUTO_INCREMENT
,	ChartReviewStatusID		int not null
,	ChartReviewStatus		varchar(32) not null
, 	PRIMARY KEY (ID)
);

Create Table factProvider (
	ID	int NOT NULL AUTO_INCREMENT
,	MasterProviderID		int not null
,	ProviderFullName		varchar(256) not null
,	ProviderFirstName		varchar(256) null
,	ProviderLastName		varchar(256) not null
,	NPI						char(12) not null
, 	PRIMARY KEY (ID)
);

Create Table luDiagnosis (
	ID	int NOT NULL AUTO_INCREMENT
,	DiagnosisCode		char(10) null
,	DiagnosisDescr		varchar(512) not null
, 	PRIMARY KEY (ID)
);

Create Table luDiagnosisHCCXref (
	ID	int NOT NULL AUTO_INCREMENT
,	DiagnosisCode		char(10) not null
,	HCCDescr		    varchar(512) not null
,	HCC_Code			  char(5) not null
,	PlanYear			  char(4) not null
, 	PRIMARY KEY (ID)
);
