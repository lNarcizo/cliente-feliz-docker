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
cp ./Projeto/.env.example ./Projeto/.env
```
Inicie a aplicação.
```sh
docker compose up
```
Instalando os pacotes do composer
```sh
docker compose run --rm composer install
```
Criando a base de dados e rodando as migrations
```sh
docker compose run --rm artisan migrate
```
### Configurando MailTrap
Vá para o arquivo .env em `/Projeto/.env` e procure as seguintes chaves
```
MAIL_MAILER
MAIL_HOST
MAIL_PORT
MAIL_USERNAME
MAIL_PASSWORD
MAIL_ENCRYPTION
```
Depois entre no site da api em https://mailtrap.io,
após criar sua conta ou realizar o login,
crie um inbox e selecione a integração laravel e preencha as chaves do .env com os valores
disponibilizados lá.

### Após isso estará finalizado a instalação e inicialização da aplicação e ela estará disponível na url:
```
http://cliente-feliz.com.br:8080
```

### Comandos adicionais caso necessite

Comandos relacionados ao composer
```sh
docker compose run --rm composer
```
Comandos relacionados ao artisan
```sh
docker compose run --rm artisan
```
Comandos relacionados ao node npm
```sh
docker compose run --rm node
```
