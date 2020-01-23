Insert Into factPerson
Select Null As ID, 0 As MasterPersonID, 'Richard' As PersonFirstName, 'Sanchez' As PersonLastName, Cast('1950-10-10' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 1 As MasterPersonID, 'Pencil' As PersonFirstName, 'Vester' As PersonLastName, Cast('1951-01-01' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 2 As MasterPersonID, 'Beth' As PersonFirstName, 'Smith' As PersonLastName, Cast('1952-02-02' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 3 As MasterPersonID, 'Jerry' As PersonFirstName, 'Smith' As PersonLastName, Cast('1953-03-03' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 4 As MasterPersonID, 'Mortimer' As PersonFirstName, 'Smith' As PersonLastName, Cast('1954-04-04' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 5 As MasterPersonID, 'Summer' As PersonFirstName, 'Smith' As PersonLastName, Cast('1955-05-05' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 6 As MasterPersonID, 'Jessica' As PersonFirstName, 'Vazquez' As PersonLastName, Cast('1956-06-06' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 7 As MasterPersonID, 'Donna' As PersonFirstName, 'Gueterman' As PersonLastName, Cast('1957-07-07' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 8 As MasterPersonID, 'Gene' As PersonFirstName, 'Goldenfold' As PersonLastName, Cast('1958-08-08' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 9 As MasterPersonID, 'Taddie' As PersonFirstName, 'Mason' As PersonLastName, Cast('1959-09-09' As Date) As PersonDateOfBirth;
Insert Into factPerson
Select Null As ID, 10 As MasterPersonID, 'Bloom' As PersonFirstName, 'Xenon' As PersonLastName, Cast('1960-10-10' As Date) As PersonDateOfBirth;


Insert Into luPersonXref
Select Null As ID,0 As MasterPersonID, '101010101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,1 As MasterPersonID, '111110101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,2 As MasterPersonID, '222220101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,3 As MasterPersonID, '333330101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,4 As MasterPersonID, '444440101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,5 As MasterPersonID, '555550101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,6 As MasterPersonID, '666660101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,7 As MasterPersonID, '777770101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,8 As MasterPersonID, '888880101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,9 As MasterPersonID, '999990101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,10 As MasterPersonID, '100100101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'B' As PersonTypeCode, CURDATE() As DateCreated;


Insert Into luPersonXref
Select Null As ID,0 As MasterPersonID, '101010' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,1 As MasterPersonID, '111111' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,2 As MasterPersonID, '121212' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,3 As MasterPersonID, '131313' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,4 As MasterPersonID, '141414' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,5 As MasterPersonID, '151515' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,6 As MasterPersonID, '161616' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,7 As MasterPersonID, '171717' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,8 As MasterPersonID, '181818' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,9 As MasterPersonID, '191919' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,10 As MasterPersonID, '100100100' As SourcePersonKey, 'CT' As SystemSourceCode, 'L' As PersonTypeCode, CURDATE() As DateCreated;


Insert Into luPersonXref
Select Null As ID,0 As MasterPersonID, '88810101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,1 As MasterPersonID, '88810101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,2 As MasterPersonID, '88820101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,3 As MasterPersonID, '88830101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,4 As MasterPersonID, '88840101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,5 As MasterPersonID, '88850101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,6 As MasterPersonID, '88860101A' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,7 As MasterPersonID, '88870101B' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,8 As MasterPersonID, '88880101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,9 As MasterPersonID, '99990101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;
Insert Into luPersonXref
Select Null As ID,10 As MasterPersonID, '10100101X' As SourcePersonKey, 'QN' As SystemSourceCode, 'R' As PersonTypeCode, CURDATE() As DateCreated;

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (0,4833,'2019-08-08','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (1,72915,'2019-08-08','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (2,8043,'2019-08-18','99305','1',2,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (3,14648,'2019-08-27','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (4,71762,'2019-08-31','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (5,74085,'2019-12-03','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (6,77801,'2019-12-03','99305','1',1,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (7,4759,'2019-12-07','99305','1',0,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (8,15405,'2019-12-07','99305','1',0,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (9,15405,'2019-12-07','99305','1',0,Null,Null,Null,Null,'2020-01-09','smccready','2020-01-09','smccready');

INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (8,'A88.81','10',Null,'2020-01-10','smccready','2020-01-10','smccready');
INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (8,'A33','10',Null,'2020-01-10','smccready','2020-01-10','smccready');
INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (9,'Z96.641','10',Null,'2020-01-10','smccready','2020-01-10','smccready');
INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (9,'C82.97','10',Null,'2020-01-10','smccready','2020-01-10','smccready');
INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (10,'M19.231','10',Null,'2020-01-10','smccready','2020-01-10','smccready');
INSERT INTO factChartReviewDiagnosis(ChartReviewId, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (10,'M19.232','10',Null,'2020-01-10','smccready','2020-01-10','smccready');


INSERT INTO luChartReviewStatus(ChartReviewStatusID, ChartReviewStatus) VALUES (0, 'In Process');
INSERT INTO luChartReviewStatus(ChartReviewStatusID, ChartReviewStatus) VALUES (1, 'Processed');
INSERT INTO luChartReviewStatus(ChartReviewStatusID, ChartReviewStatus) VALUES (2, 'Void');
