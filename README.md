# Sistema de Cadastro IFTO - PHP Orientado a Objetos e PDO

Sistema _web_ completo de cadastro de pessoas desenvolvido utilizando **PHP com PDO** e **Programação Orientada a Objetos (POO)**, integrado a um banco de dados relacional (**MySQL**). O projeto possui uma interface gráfica moderna e responsiva estruturada em **HTML5** e **CSS3**.

Projeto desenvolvido com fins acadêmicos para atender aos requisitos da atividade, englobando operações de banco de dados, conceitos de POO e publicação em ambiente de hospedagem _on-line_.

# 1. Funcionalidades (CRUD Completo):

O sistema permite o gerenciamento completo de informações através das operações básicas de um CRUD:

- **1.1 Cadastrar (_Create_):** Inserção de novos registros (Estudantes, Professores, Servidores e Visitantes) com _upload_ de foto de perfil;
- **1.2 Listar (_Read_):** Exibição dos dados cadastrados em uma tabela dinâmica, com status e sistema de busca em tempo real;
- **1.3 Editar (_Update_):** Atualização e correção das informações de um registro já existente no banco;
- **1.4 Excluir (_Delete_):** Remoção permanente de registros do banco de dados.

*Funcionalidades Extras de Interface:*
- Alternância de Tema (_Light Mode_/_Dark Mode_);
- Bloqueio dinâmico de campos no formulário;
- _Upload_ e pré-visualização de imagem (.png).

# 2. Tecnologias Utilizadas:

As tecnologias aplicadas no desenvolvimento deste projeto foram:

**Front-end:**

- HTML5;
- CSS3;
- JavaScript;
- Font Awesome (Ícones).

**Back-end & Banco de Dados:**

- PHP 8+;
- POO (Programação Orientada a Objetos);
- PDO (_PHP Data Objects_) para persistência de dados segura;
- MySQL.

# 3. Estrutura do Projeto:

```bash
PROJETO_POO_CADASTRO_IFTO/
│
├── assets/
│   ├── logo.png
│   ├── Prof. Marcos.png
│   └── styles.css
│
├── uploads/
│   └── (imagens .png de perfil criptografadas geradas pelo sistema)
│
├── .gitattributes
├── conexao.php        
├── editar.php         
├── Estudante.php      
├── excluir.php        
├── index.php          
├── Pessoa.php         
├── Professor.php      
├── salvar.php         
├── Servidor.php       
├── Visitante.php      
│
└── README.md

BD_CADASTRO_IFTO/
│
├── bd_cadastro_ifto.sql
```

# 4. Hospedagem:

Atendendo aos requisitos da atividade, o sistema foi publicado e encontra-se disponível para acesso através do serviço de hospedagem gratuita _on-line_.

🌍 Acesso ao sistema _on-line_: [https://cadastro-pessoas-ifto.infinityfree.me]

# 5. Repositório Público:

O código-fonte completo deste sistema encontra-se versionado e disponível publicamente.

🔗 Link do Repositório: [https://github.com/jecc-estudant/Projeto-Pratico-CRUD-com-PDO]

6. Licença
Este projeto é destinado estritamente para fins educacionais e acadêmicos (IFTO).
