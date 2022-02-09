

[URL_DESAFIO]:https://github.com/Promobit/teste-cadastro-produtos

[Desafio Promobit]:https://github.com/Promobit/teste-cadastro-produtos

[Clique aqui]:https://github.com/Promobit/teste-cadastro-produtos

[Link teste logico]:https://github.com/gusscamargo/Desafio-Promobit/blob/main/teste-logica/src/src/ProductStructure.php

  

# Desafio Backend Promobit

  

Link para resolução do teste logico: [Link teste logico]

  

Link do desafio tecnico: [Clique aqui]

  

## Objetivo

Desenvolvimento de uma aplicação PHP completa utilizando das mais modernas tecnologias presentes no mercado com base no [Desafio Promobit].

  

## O que compõe o projeto?

1. [Docker](https://www.docker.com/)
3. [Docker Compose](https://docs.docker.com/compose/)

4. [NGINX](https://www.nginx.com/)

5. [PHP 7.4](https://www.php.net/releases/7_4_0.php)
6. [Composer](https://getcomposer.org/)

7. [MySQL](https://www.mysql.com/)

8. [Laravel 8](https://laravel.com/docs/8.x/releases)

9. [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)

10. [Redis](https://redis.io/)

11. [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)

12. [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)

13. [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)

  

## Coisas que o projeto possui:

  

1. Ambiente de desenvolvimento Docker.

2. Sistema de Autenticação com senha criptografada.

3. Sistema de caching com armazenamento no Redis.

4. Cadastro, edição e exclusão de Tags.

5. Cadastro, edição e exclusão de Produtos e tags relacionadas.

6. Tratamento de erros de rotas.

7. **Dica surpresa**: Force um erro **404**.

## Script SQL para extração de relatório do desafio

Podes acessar o banco de dados via phpMyAdmin que se encontra no endereço [127.0.0.1:8080](http://127.0.0.1:8080/)

```SELECT `tag`.`name` AS nome, (SELECT COUNT(*) FROM `product_tag` WHERE `product_tag`.`tag_id` = `tag`.`id`) AS num_produtos_relacionados from `tag` ORDER BY num_produtos_relacionados DESC```

  

## Como instalar e inicializar

Antes de qualquer coisa, avisos:

1. Verifique se não há qualquer outro software ocupando as portas 80 e 8080 do localhost, caso sim, desligar e desocupar as portas ou mudar as portas padrões do sistema no arquivo .env que se encontra na raiz do projeto.

2. Caso dê algum erro relacionada a imagem Docker do php-fpm, digitar no terminal `docker-compose build`.

  

Siga os passos a seguir no terminal

1. `git clone https://github.com/gusscamargo/Desafio-Promobit`

2. `cd Desafio-Promobit`

3. `docker-compose up -d`

4. `docker-compose exec app composer install`

  

Após o fim dos processos acesse [127.0.0.1](http://127.0.0.1/) ou 127.0.0.1:**NGINX** configurada no arquivo .env

  

**Você ira se deparar com um formulario de login que pedira usuario e senha, a resposta para ambos é "admin".**

  

![PHP](https://kinsta.com/pt/wp-content/uploads/sites/3/2018/11/o-php-morreu-0-1.jpg)
