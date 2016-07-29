Materials app
=============

Aplikacja do zarządzania grupami materiałów, jednostkami a także materiałami.

### Instalacja i konfiguracja
---

##### Pobranie i zainstalowanie biblioteki Composer
[link do biblioteki composer](https://getcomposer.org/doc/00-intro.md#using-the-installer).

##### Konfiguracja bazy danych
- Utworzenie nowej bazy danych o nazwie `materials` z domyślnymi uprawnieniami 
- Uruchamiamy wiersz poleceń i przechodzimy do głównego katalogu z aplikacją ../materials/
- Wydajemy polecenie `php artisan migrate`, aby utworzyć wszystkie tabele
- Następnie polecenie `php artisan db:seed` aby pobrać już utworzone przykładowe dane
- Aplikacja dostępna pod adresem `localhost/materials/public`

### Licencja
---
Apliakcja wykorzystuje bibliotekę [bootstrap-select](https://github.com/silviomoreto/bootstrap-select) na licencji [MIT](https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE).
