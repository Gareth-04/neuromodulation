IF DB_ID(N'Neuromodulation') IS NULL
BEGIN
    CREATE DATABASE Neuromodulation;
END;
GO
-- creats a sql database if no database is found 