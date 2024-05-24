CREATE TABLE wypozyczenia (
    Nr_transakcji INT AUTO_INCREMENT PRIMARY KEY,
    Sygnatura VARCHAR(50) NOT NULL,
    Id_pracownika INT NOT NULL,
    Nr_czytelnika INT NOT NULL,
    Data_wypozyczenia DATE NOT NULL,
    Data_zwrotu DATE
);

INSERT INTO wypozyczenia (Sygnatura, Id_pracownika, Nr_czytelnika, Data_wypozyczenia, Data_zwrotu) VALUES
('A123', 101, 201, '2024-05-01', '2024-05-15'),
('B456', 102, 202, '2024-05-03', '2024-05-17'),
('C789', 103, 203, '2024-05-05', NULL),
('D012', 104, 204, '2024-05-07', NULL);
