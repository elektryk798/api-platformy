Aby uruchomić projekt należy rozpakować pobrane repozytorium z https://github.com/elektryk798/api-platformy

W głównym katalogu projektu skopiować plik .env.examples i wkleić go w tym samym katalogu pod nazwą .env 

Wypełnić pola pliku .env odpowiadające za połączenie z bazą danych
oraz ustawić następujące pola z podanymi wartościami:
BITBAY_API_URL=https://bitbay.net/API/Public/BTCPLN/trades.json
JWT_TTL=43200

wywołać polecenie "composer install" w głównym katalogu projektu

wywołać polecenie "php artisan key:generate" w głównym katalogu projektu

wywołać polecenie "php artisan migrate" w głównym katalogu projektu

wywołać polecenie "php artisan jwt:secret" w głównym katalogu projektu

wywołać polecenie "php artisan bit-bay:update-trades" w głównym katalogu projektu

wywołać polecenie "php artisan serve" w głównym katalogu projektu

W celu codzniennej aktualizacji bazy danych należy uruchomić zadanie Cron

Aby zalogować się najpierw trzeba zarejestrować użytkownika, 
na stronie głównej projektu znajduje się przycisk "Register".