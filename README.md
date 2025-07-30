
# Project Base PHP MVC

Projeto base desenvolvido em PHP com arquitetura MVC moderna, utilizando:

- **Twig** como template engine  
- **Composer** para autoload de dependências  
- **Helpers** personalizados  
- **.env** para variáveis de ambiente  
- **Estrutura modular** com pasta `app`, `core`, `views`, etc.

---

## Tecnologias Utilizadas

- PHP 8+
- Composer
- Twig
- DotEnv (.env)
- Guzzle (via composer)
- PHPMailer

---

## Estrutura de Pastas

```
project-base/
├── app/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   │   ├── includes/
│   │   └── home/
│   └── core/
├── public/
│   ├── css/
│   └── js/
├── src/
│   └── helpers/
├── vendor/
├── .env
├── composer.json
├── index.php
```

---

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/project-base.git
   ```

2. Acesse a pasta do projeto:
   ```bash
   cd project-base
   ```

3. Instale as dependências:
   ```bash
   composer install
   ```

4. Configure o arquivo `.env` com suas informações:
   ```
   APP_URL=http://localhost/project-base
   DB_HOST=localhost
   DB_NAME=seu_banco
   DB_USER=root
   DB_PASS=
   ```

5. Aponte seu servidor Apache para a pasta `public/`.

---

## Teste rápido

O controller `HomeController` utiliza o model `Teste` para checar a conexão com o banco de dados e envia o resultado para a view usando Twig.

---

## Autor

Desenvolvido por [Vitor Yvens](https://github.com/vitoryvensreis)

---

## Licença

Esse projeto está sob a licença MIT.
