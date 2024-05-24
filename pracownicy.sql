-- Create the pracownicy table
CREATE TABLE pracownicy (
    Id_pracownika INT AUTO_INCREMENT PRIMARY KEY,
    Imie VARCHAR(50),
    Miasto VARCHAR(50),
    Data_zatrudnienia DATE,
    Wynagrodzenie DECIMAL(10, 2)
);

-- Insert example data into the pracownicy table
INSERT INTO pracownicy (Id_pracownika, Imie, Miasto, Data_zatrudnienia, Wynagrodzenie) VALUES
(1, 'Jan', 'Warszawa', '2020-01-15', 5000.00),
(2, 'Anna', 'Kraków', '2019-06-23', 4500.50),
(3, 'Piotr', 'Wrocław', '2021-11-01', 5200.75),
(4, 'Katarzyna', 'Gdańsk', '2018-03-30', 4800.00),
(5, 'Tomasz', 'Poznań', '2022-05-14', 4700.00),
(6, 'Magdalena', 'Łódź', '2017-08-10', 5300.25),
(7, 'Michał', 'Szczecin', '2021-02-18', 4900.00),
(8, 'Agnieszka', 'Lublin', '2020-09-25', 4600.00),
(9, 'Rafał', 'Katowice', '2019-12-01', 5100.50),
(10, 'Joanna', 'Bydgoszcz', '2018-11-05', 4400.75);

-- Query the table to check the inserted data
SELECT * FROM pracownicy;
