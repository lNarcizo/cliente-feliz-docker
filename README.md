## Cliente Feliz


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
cp /Projeto/.env.example /Projeto/.env
```
Inicie a aplicação.
```sh
docker-compose up
```
Instalando os pacotes do composer
```sh
docker-compose run --rm composer install
```
Criando a base de dados e rodando as migrations
```sh
docker-compose run --rm artisan migrate
```
Após isso estará finalizado a instalação e inicialização da aplicação e ela estará disponível na url:
```
http://cliente-feliz.com.br:8080
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
