# WdPAI

Repozytorium zawierające projekt z przedmiotu Wstęp do Projektowania Aplikacji Internetowych  
Aplikacja do tworzenia notatek

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Screenshots](#screenshots)
* [Usage](#usage)
* [Additional info](#additional-info)

## General info
- Register and log into the app
- Add and remove notes
- Change user settings
- Admin can delete users from system

## Technologies
- HTML5
- CSS3
- PHP 7.4
- DOCKER
- POSTGRES

## Screenshots
![Login](./screens/login.PNG)
![Login-mobile](./screens/login_mobile.PNG)
![Register](./screens/register.PNG)
![Register-mobile](./screens/register_mobile.PNG)
![Main](./screens/main.PNG)
![Main-mobile](./screens/main_mobile.PNG)
![All](./screens/all.PNG)
![All-mobile](./screens/all_mobile.PNG)
![Settings](./screens/settings.PNG)
![Settings-mobile](./screens/settings_mobile.PNG)
![Admin](./screens/admin.PNG)
![Admin-mobile](./screens/admin_mobile.PNG)

## Usage
- To start app type: ```docker-compose up```

## Additional info
- Niestety nie udało mi się zaimplementować kontrolera do widoku `week_page`, 
ale zostawiłem go na pasku nawigacyjnym, ponieważ sam widok został przeze mnie 
zrobiony w CSS i jest w pełni responsywny, dlatego myślę, że go zobaczyć.
- Dostęp do panelu admina: `/admin`
- Rolę admina można ustawić z poziomu bazy danych, ale domyślnie jest w 
systemie jeden administrator, dlatego podam tu dane dostępowe (username: `jannowak`, 
password: `12345`) - dane testowe (nie zwracać uwagi)
- Pozdrawiam i życzę miłego dnia/wieczoru :)
