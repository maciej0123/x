CREATE TABLE stanowiska (
    Id_stanowiska INT AUTO_INCREMENT PRIMARY KEY,
    Nazwa VARCHAR(100) NOT NULL
);

INSERT INTO stanowiska (Nazwa) VALUES
('Manager'),
('Developer'),
('Designer'),
('Analyst'),
('Tester');
