# Teste Dz
Solução para o problema proposto.

## Requisitos
Esta aplicação foi desenvolvida totalmente em tecnologias web, portanto não é necessário dispor de muitos recursos para rodá-la. Apenas de:

* Um navegador web (ex. Chrome, Firefox, etc);
* Um servidor local ou um software que simule um. Sugestão: Xampp [(Mais informações)](https://www.apachefriends.org/pt_br/index.html)

## Instruções
* Primeiro instale o Xampp em seu computador.
* Clone este repositório ou baixe-o e descompacte para uma pasta dentro de "xampp/htdocs/html".
* Abra o Xampp e inicie o "Apache".
* Abra seu navegador de preferência.
* Acesse a aplicação através do endereço: "http://localhost/nome-da-pasta-criada".
* Tudo pronto, agora faça o quiz.

### Observações
Se você usa um servidor local diferente ou não consegue acessar a aplicação, certifique-se que o módulo "rewrite" do Apache esteja ativado. 

Para ativar o módulo "rewrite" no Xampp basta abrir o Xampp, clicar em "Config" na mesma linha do Apache, clicar em "Apache(httpd.conf)", no arquivo que abrir procure pela linha "LoadModule rewrite_module modules/mod_rewrite.so" e retire, se for necessário, o "#" no inicio da frase.


## Resolução do problema
Para resolvê-lo, primeiramente pensei em dar um valor numérico para cada resposta pois uma deveria ter mais valor que a outra, do menor valor ao maior conforme instruções.

Isto é bem simples de se resolver, mas era necessário prever alguns problemas como empates de respostas e, como mostrado nos casos de teste, três respostas deveríam valer mais do que duas.

Então para solucionar os empates pensei em utilizar números ímpares, assim nunca haveriam empates. A primeira resposta valeria 1, a segunda 3, a terceira 5 e assim por diante. Isso resolveu os empates, mas não resolveu o caso de teste 5, pois as 3 primeiras respostas somavam 9 e as duas últimas 16 gerando outro resultado.

Então usei valores entre 10 e 14, dessa forma não é possível haver empates e 3 respostas teríam maior valor que 2. Assim todos os casos de teste foram solucionados.

Também implantei um mecanismo que impede que o usuário troque de resposta antes de concluir o teste, além de que as tarefas nunca "ocupem" a mesma posição visual, assim cada vez que o usuário acessar a página terá as respostas em posições diferentes.
