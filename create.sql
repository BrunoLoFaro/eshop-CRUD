CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stars INT CHECK (stars BETWEEN 0 AND 5),
    isInStock BOOLEAN DEFAULT TRUE
);

INSERT INTO products (name, description, price, stars, isInStock) VALUES
('Auriculares Bluetooth', 'Auriculares inalámbricos con cancelación de ruido y estuche de carga.', 199.99, 5, TRUE),
('Teclado Mecánico', 'Teclado con switches azules, retroiluminado RGB.', 89.50, 4, TRUE),
('Monitor 24 pulgadas', 'Pantalla IPS Full HD con entrada HDMI y VGA.', 149.00, 4, TRUE),
('Mouse Gamer', 'Mouse óptico con 6 botones programables y luces LED.', 39.90, 3, TRUE),
('Silla Ergonómica', 'Silla con soporte lumbar y ajuste de altura.', 229.99, 5, FALSE),
('Webcam HD', 'Cámara web con resolución 1080p y micrófono incorporado.', 69.95, 4, TRUE),
('Disco SSD 1TB', 'Unidad de estado sólido SATA III con alta velocidad de lectura.', 119.99, 5, TRUE),
('Hub USB 4 Puertos', 'Multiplicador de puertos USB 3.0.', 24.99, 3, TRUE),
('Parlantes Estéreo', 'Parlantes de escritorio con buena calidad de sonido.', 34.99, 4, TRUE),
('Tablet 10"', 'Tablet Android con pantalla HD y batería de larga duración.', 179.90, 4, FALSE);
