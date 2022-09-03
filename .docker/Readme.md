# Przygotowanie WSL do instalacji projektu

1. W menu start Funkcje systemu Windows -> Włączyć Podsystem Windows dla systemu linux i restart komputera
2. Odpalić PowerShell jak administrator -> "Enable-WindowsOptionalFeature -Online -FeatureName VirtualMachinePlatform" i restart komputera
3. Pobrać i zainstalować https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi
4. W powershell odpalić "wsl --set-default-version 2"
5. Przenieść plik installDir/.wslconfig do folderu C:/Users/<nasz użytkownik>
6. W sklepie Microsoftu zainstalować Debian -> otworzyć Debian poprzez MicrosoftStore i dodać swojego użytkownika i hasło
7. (Opcjonalnie) Jeżeli podczas instalacji wyskoczy błąd z brakiem wirtualizacji należy włączyć w BIOS Virtualization

# Instalacja docker desktop

1. https://www.docker.com/get-started/
2. Po instalacji w ustawieniach -> General sprawdzić czy wlączona jest opcja "Use the WSL 2 based engine"
3. Po instalacji w ustawieniach -> Resources -> wsl integration zaznaczyć Debian

# Pierwsze odpalenie localhost

Komenda w windows (wykonujemy w głównym folderze dockera w którym zanjduje się Dockerfile)``docker build -t apache_php .``
 
Pierwsze odpalenie localhost ``docker-compose up -d`` pierwsze odpalenie trwa około 5 min (wykonujemy w głównym folderze dockera w którym zanjduje się docker-compose.yml)

Kolejne uruchomienia jeżeli jest taka potrzeba wykonujemy bezpośrednio z aplikacji Docker desktop przyciskiem play w zakładce Containers, standardowo docker desktop uruch