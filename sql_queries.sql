-- Réinitialisation et Insertion des 6 Activités Uniques
DELETE FROM activities;

INSERT INTO activities (name, city, description, price, duration) VALUES 
('Tour Eiffel Sommet', 'Paris', 'Vue imprenable sur tout Paris depuis le sommet.', 30, '3 heures'),
('Jardin Majorelle', 'Marrakech', 'Promenade dans le célèbre jardin botanique.', 12, '2 heures'),
('Colisée & Forum Romain', 'Rome', 'Plongez dans l\'histoire de la Rome antique.', 25, '3 heures'),
('Tramway 28', 'Lisbonne', 'Découverte des quartiers historiques en tram emblématique.', 5, '1 heure'),
('Citadelle Laferrière', 'Haiti', 'Visite de la plus grande forteresse des Caraïbes classée UNESCO.', 35, '4 heures'),
('Burj Khalifa', 'Dubai', 'Accès à la plus haute tour du monde.', 45, '2 heures');
