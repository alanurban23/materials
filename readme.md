Materials app
=============

Aplikacja do zarządzania grupami materiałów, jednostkami a także materiałami.

### Instalacja i konfiguracja
---

##### Konfiguracja bazy danych
- Utworzenie nowej bazy danych o nazwie `materials`
- Utowrzenie użytkownika materials:materials
- Wydajemy polecenie `php artisan migrate`, aby utworzyć wszystkie tabele
- Następnie polecenie `php artisan db:seed` aby pobrać już utworzone przykładowe dane

### Licencja
---
Apliakcja wykorzystuje bibliotekę [bootstrap-select](https://github.com/silviomoreto/bootstrap-select) na licencji [MIT](https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE).
