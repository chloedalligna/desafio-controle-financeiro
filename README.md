# Projeto Laravel: desafio-controle-financeiro

-----

Desafio: Sistema de Controle de Despesas Pessoais com PHP e MySQL, para candidatar-se à vaga de Trainee na Impacta Web Soluções.

Este projeto foi desenvolvido por Chloe Sophia Golubiewski Dall'Igna, aluna do curso e projeto social Codifica+ promovido pelo IDCAP e pela Impacta Web Soluções.

As fontes e consultas usadas na elaboração estão contempladas no arquivo txt "links" dentro da pasta principal.

-----

### Como rodar o projeto

Este projeto deve ser hospedado localmente.

Para iniciar este projeto em seu dispositivo você deve:
- Como o banco de dados utilizado é baseado em MySQL e não fiz nenhuma migration para a sua criação, a criação da schema devendo ser feita manualmente com o nome _**"desafio_controle_financeiro"**_.
- Dar os comandos:
```bash
php artisan migrate
php artisan db:seed    
```

Esses comandos vão criar as tabelas e inserir os tipos de transação disponíveis por padrão — despesa e receita.

Para finalmente rodar o projeto, basta rodar estes dois comandos:

```php
php artisan serve
```

```php
npm run dev
```

É possível criar uma conta, com transações e categorias próprias, que não são acessíveis para os demais usuários.

Os filtros são funcionais e de acordo com as categorias e datas adicionadas pelo próprio usuário.

Os somatórios exibidos no dashboard são filtráveis e exibidos de acordo com os filtros selecionados.

-----

### Funcionalidades secundárias

#### Verificação de e-mail

É possível habilitar a verificação da conta por e-mail, que impede o acesso ao dashboard e é acionada somente após o registro do usuário.
As rotas que possibilitam esta funcionalidade estão comentadas no arquivo "routes/web.php", devendo descomentá-las e também descomentar a primeira linha e comentar a segunda linha:

```php
//Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth',])->group(function () {
```

Além disso, o "env" deve ser alterado na seguinte seção e com os seguintes dados:

```
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME= //o endereço de e-mail que seja utilizar para enviar os e-mails de verificação
MAIL_PASSWORD= //a app password do seu e-mail
MAIL_FROM_ADDRESS="naoresponda@desafiofinanceiro.com" //não testei assim, então talvez tenha que repetir o seu e-mail escolhido para o envio caso não funcione
MAIL_FROM_NAME="${APP_NAME}"´´´
```

Porém, o endereço de e-mail cadastrado no registro da conta deve ser acessível pelo dispositivo hospedando localmente, pois o link e o botão recebidos via e-mail só funcionam se integir com eles no dispositivo com o servidor local.

#### Plano Premium

Existe a coluna de "is_premium" para cada usuário, porém não há nenhuma funcionalidade real que ela restringe.

Existem botões que levam à telas para "realizar a assinatura" do Plano Premium e na tela de perfil do usuário mostra se o usuário logado é Premium, além de mostrar o username escolhido no momento de registro da conta.

Iniciei a criação de Gates e estava pesquisando sobre Policies para restringir alguma coisa (os filtros ou os somatórios) ao Plano Premium, porém não dei continuidade por falta de tempo hábil e de entendimento do assunto.

-----

## Finalizado, obrigada pela atenção!
