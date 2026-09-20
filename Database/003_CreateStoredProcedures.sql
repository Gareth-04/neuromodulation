USE Neuromodulation;
GO

-- CREATE

CREATE OR ALTER PROCEDURE dbo.NeuromodulationForm_Create
    @FirstName NVARCHAR(100),
    @Surname NVARCHAR(100),
    @DateOfBirth DATE,
    @Question1 TINYINT,
    @Question2 TINYINT,
    @Question3 TINYINT,
    @Question4 TINYINT,
    @Question5 TINYINT,
    @Question6 TINYINT,
    @Question7 TINYINT,
    @Question8 TINYINT,
    @Question9 TINYINT,
    @Question10 TINYINT,
    @Question11 TINYINT,
    @Question12 TINYINT
AS
BEGIN

    SET NOCOUNT ON;

    DECLARE @TotalScore SMALLINT;

    SET @TotalScore =
          @Question2
        + @Question3
        + @Question4
        + @Question5
        + @Question6
        + @Question7
        + @Question8
        + @Question9
        + @Question10
        + @Question11
        + @Question12;

    INSERT INTO dbo.NeuromodulationForms
    (
        FirstName,
        Surname,
        DateOfBirth,
        Question1,
        Question2,
        Question3,
        Question4,
        Question5,
        Question6,
        Question7,
        Question8,
        Question9,
        Question10,
        Question11,
        Question12,
        TotalScore
    )
    VALUES
    (
        @FirstName,
        @Surname,
        @DateOfBirth,
        @Question1,
        @Question2,
        @Question3,
        @Question4,
        @Question5,
        @Question6,
        @Question7,
        @Question8,
        @Question9,
        @Question10,
        @Question11,
        @Question12,
        @TotalScore
    );

    SELECT CAST(SCOPE_IDENTITY() AS INT) AS FormId;

END;
GO



-- READ ALL


CREATE OR ALTER PROCEDURE dbo.NeuromodulationForm_GetAll
AS
BEGIN

    SET NOCOUNT ON;

    SELECT
        FormId,
        SubmittedAt,
        FirstName,
        Surname,
        DateOfBirth,
        TotalScore
    FROM dbo.NeuromodulationForms
    ORDER BY SubmittedAt DESC;

END;
GO

--READ ONE

CREATE OR ALTER PROCEDURE dbo.NeuromodulationForm_GetById
    @FormId INT
AS
BEGIN

    SET NOCOUNT ON;

    SELECT
        FormId,
        SubmittedAt,
        FirstName,
        Surname,
        DateOfBirth,

        Question1,
        Question2,
        Question3,
        Question4,
        Question5,
        Question6,
        Question7,
        Question8,
        Question9,
        Question10,
        Question11,
        Question12,

        TotalScore

    FROM dbo.NeuromodulationForms

    WHERE FormId = @FormId;

END;
GO

-- UPDATE

CREATE OR ALTER PROCEDURE dbo.NeuromodulationForm_Update
    @FormId INT,

    @FirstName NVARCHAR(100),
    @Surname NVARCHAR(100),
    @DateOfBirth DATE,

    @Question1 TINYINT,
    @Question2 TINYINT,
    @Question3 TINYINT,
    @Question4 TINYINT,
    @Question5 TINYINT,
    @Question6 TINYINT,
    @Question7 TINYINT,
    @Question8 TINYINT,
    @Question9 TINYINT,
    @Question10 TINYINT,
    @Question11 TINYINT,
    @Question12 TINYINT
AS
BEGIN

    SET NOCOUNT ON;

    DECLARE @TotalScore SMALLINT;

    SET @TotalScore =
          @Question2
        + @Question3
        + @Question4
        + @Question5
        + @Question6
        + @Question7
        + @Question8
        + @Question9
        + @Question10
        + @Question11
        + @Question12;

    UPDATE dbo.NeuromodulationForms
    SET
        FirstName = @FirstName,
        Surname = @Surname,
        DateOfBirth = @DateOfBirth,

        Question1 = @Question1,
        Question2 = @Question2,
        Question3 = @Question3,
        Question4 = @Question4,
        Question5 = @Question5,
        Question6 = @Question6,
        Question7 = @Question7,
        Question8 = @Question8,
        Question9 = @Question9,
        Question10 = @Question10,
        Question11 = @Question11,
        Question12 = @Question12,

        TotalScore = @TotalScore

    WHERE FormId = @FormId;

END;
GO


-- DELETE

CREATE OR ALTER PROCEDURE dbo.NeuromodulationForm_Delete
    @FormId INT
AS
BEGIN

    SET NOCOUNT ON;

    DELETE FROM dbo.NeuromodulationForms
    WHERE FormId = @FormId;

END;
GO