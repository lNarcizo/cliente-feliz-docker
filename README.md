## Clinte Feliz


### Começando instalação

Adicione em hosts `/etc/hots`

```
127.0.0.1       cliente-feliz.com.br
```

Para iniciar a aplicação execute os próximos comandos:

Crie os arquivos de configuração usando

```sh
cp .env.example .env
```
```sh
cp /app/.env.example /app/.env
```
Inicie a aplicação.
```sh
docker-compose up
```
Instale os pacotes do composer
```sh
docker-compose run --rm composer install
```
Criando a base de dados e rode as migrations
```sh
docker-compose run --rm artisan migrate
```
### Comandos adicionais caso necessite

Comandos relacionados ao composer
```sh
docker-compose run --rm composer
```
Comandos relacionados ao artisan
```sh
docker-compose run --rm artisan
```
Comandos relacionados ao node npm
```sh
docker-compose run --rm node
```