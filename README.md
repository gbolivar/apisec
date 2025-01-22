# Container develop
## Clone repo
```shell
git clone git@github.com:gbolivar/apisec.git
```
## Requite make
```shell
apt install make
```
## Move Project
```shell
cd apisec
```
## Run command
### Build code
```shell
make build
```
### start container
```shell
make start
``` 

### run app 
```shell
make app-run
```

### Browser 
```shell
firefox http://localhost:20090/
```

### Run code
```shell
    make ssh-ba

    
```

### Deuda tecnica
1) https://packagist.org/packages/ryangjchandler/laravel-cloudflare-turnstile

### Laravel
#### 1) phpstan # Detecta posibles errores en el código.
#### 2) php-cs-fixer # Comprueba el formato del código.
#### 3) phpunit
#### 4) tymon/jwt-auth # jwt
