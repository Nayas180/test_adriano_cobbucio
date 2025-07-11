<h1>
  Documentação Projeto
</h1>

<h4>
  Para o projeto utilizei o ecosistema do Laravel Sail para trazer todo cobertura do projeto em docker.

  Embora não foi solicitado, elaborei algumas partes do que seria o front-end dessa aplicação.
  OBS: Tive certos problemas com vue, então algumas coisa deixei de fora, para focar no principal.
</h4>


<p>
  Como rodar o projeto?

  É simples

  1 - Clone o projeto
  2 - Abra o terminal
  3 - Digite ```./vendor/bin/sail up -d``` o projeto do Sail irá subir em seu docker (Caso esteja usando Windows use o WSL2)
  4 - Ao finalizar abra o localhost
  5 - Abrir a tela de welcome (Essa tela eu inseri o login/cadastro nela mesma)
  6 - Efetue o cadastro 
  7 - Pos o cadastro vai abrir a dashboard do sistema, nela você podera Depositar/Transferir e ver seu saldo.
  8 - Hora de rodar as migrations e seeders, porem antes, crie o alias em seu terminal para trabalhar com o SAIL, segue o comando abaixo
    ``` alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)' ```
  9 - Rote as migrations ``` sail artisan migrate ```
  10 - Rote os seeders ``` sail artisan db:seed ```

  Apos tudo feito, pode testar tudo.


  (OBS: Por motivos maiores, precisei me ausentar nos dias do prazo, com isso, não fiz o LAYOUT do estorno, porem todo o ecosistema em endpoint foi feito.)

  Abaixo segue as rotas para teste.


  1 - POST api/estorno/transferencia
      id_transferencia
      id_solicitacao (para entender cada solicitacao, vá ao arquivo SolicitacoesSeeder)

  2 - POST api/estorno/deposito
      id_deposito
      id_solicitacao (para entender cada solicitacao, vá ao arquivo SolicitacoesSeeder)

  Muito Obrigado pela atenção.
</p>
