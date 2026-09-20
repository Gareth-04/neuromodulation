USE Neuromodulation;
GO

IF OBJECT_ID(N'dbo.NeuromodulationForms', N'U') IS NULL
BEGIN

    CREATE TABLE dbo.NeuromodulationForms
    (
        FormId INT IDENTITY(1,1) NOT NULL,

        FirstName NVARCHAR(100) NOT NULL,
        Surname NVARCHAR(100) NOT NULL,
        DateOfBirth DATE NOT NULL,

        Question1 TINYINT NOT NULL,
        Question2 TINYINT NOT NULL,
        Question3 TINYINT NOT NULL,
        Question4 TINYINT NOT NULL,
        Question5 TINYINT NOT NULL,
        Question6 TINYINT NOT NULL,
        Question7 TINYINT NOT NULL,
        Question8 TINYINT NOT NULL,
        Question9 TINYINT NOT NULL,
        Question10 TINYINT NOT NULL,
        Question11 TINYINT NOT NULL,
        Question12 TINYINT NOT NULL,

        TotalScore SMALLINT NOT NULL,

        SubmittedAt DATETIME2(0) NOT NULL
            CONSTRAINT DF_NeuromodulationForms_SubmittedAt
            DEFAULT SYSDATETIME(),

        CONSTRAINT PK_NeuromodulationForms
            PRIMARY KEY (FormId),

        CONSTRAINT CK_NeuromodulationForms_Question1
            CHECK (Question1 BETWEEN 0 AND 100),

        CONSTRAINT CK_NeuromodulationForms_Questions2To12
            CHECK
            (
                Question2 BETWEEN 0 AND 10
                AND Question3 BETWEEN 0 AND 10
                AND Question4 BETWEEN 0 AND 10
                AND Question5 BETWEEN 0 AND 10
                AND Question6 BETWEEN 0 AND 10
                AND Question7 BETWEEN 0 AND 10
                AND Question8 BETWEEN 0 AND 10
                AND Question9 BETWEEN 0 AND 10
                AND Question10 BETWEEN 0 AND 10
                AND Question11 BETWEEN 0 AND 10
                AND Question12 BETWEEN 0 AND 10
            ),

        CONSTRAINT CK_NeuromodulationForms_TotalScore
            CHECK (TotalScore BETWEEN 0 AND 110)
    );

END;
GO