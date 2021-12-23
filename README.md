[URL_DESAFIO]:https://github.com/Promobit/teste-cadastro-produtos
[Desafio Promobit]:https://github.com/Promobit/teste-cadastro-produtos
[Clique aqui]:https://github.com/Promobit/teste-cadastro-produtos

# Desafio Promobit

Link do desafio: [Clique aqui]

## Objetivo
Desenvolvimento de um projeto-aplicação Full Stack com Back End em PHP com conexão e interação com um banco de dados relacionado como o MySQL ou PostgreSQL tendo como base e objetivo o [Desafio Promobit].

## O que compõe o projeto?
1.  Docker
2. Nginx
3.  PHP 7.4
4. MySQL 5.7.35
5. Laravel 8
6. Bootstrap 5
7. Redis
8. HTML
9. CSS
10. Javascript 

## Coisas que o projeto possui:

1. Ambiente de desenvolvimento Docker.
2. Sistema de Autenticação com senha criptografada.
3. Sistema de caching com armazenamento no Redis.
4. Cadastro de Tags.
5. Cadastro de Produtos e tags relacionadas.
6. Tratamento de erros de rotas.
7. **Dica surpresa**: Force um erro **404**. 

## Como instalar e inicializar
Antes de qualquer coisa, avisos:
1. Verifique se não há qualquer outro software ocupando as portas 80 e 8080 do localhost, caso sim, desligar e desocupar as portas ou mudar as portas padrões do sistema  no arquivo .env que se encontra na raiz do projeto.
2. Caso dê algum erro relacionada a imagem Docker do php-fpm, digitar no terminal `docker-compose build`.

Siga os passos a seguir no terminal
1. `git clone https://github.com/gusscamargo/Desafio-Promobit`
2. `cd Desafio-Promobit`
3. `docker-compose up -d`
4. `docker-compose exec app composer install`

Após o fim dos processos acesse [127.0.0.1](http://127.0.0.1/) ou 127.0.0.1:< NGINX > configurada no arquivo .env

**Você ira se deparar com um formulario de login que pedira usuario e senha, a resposta para ambos é "admin".**