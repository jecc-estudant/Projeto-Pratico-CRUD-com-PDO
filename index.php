<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - IFTO Campus Paraíso do Tocantins</title>
    <link rel="icon" href="assets/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <div class="container">

        <aside class="sidebar">
            <div class="logo">
                <img src="assets/logo.png" alt="Logo IFTO" class="logo-img">
            </div>
            <div class="user-box">
                <img src="assets/Prof. Marcos.png" alt="Usuário">
                <div>
                    <h3>Marcos Raimundo</h3>
                    <small>Administrador</small>
                </div>
            </div>
            <p class="menu-title">MENU PRINCIPAL</p>
            <ul class="menu">
                <li><a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> Configurações</a></li>
            </ul>
        </aside>

        <main class="main">

           <div class="topbar">
                <div><h1>Cadastro de Pessoas - IFTO</h1></div>
                
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span class="badge">ATIVO</span>
                    <button type="button" id="themeToggle" class="theme-toggle-btn" title="Alternar Tema">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                </div>
            </div>

            <section class="card">
                <h2 class="card-title">CADASTRO</h2>

                <form action="salvar.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="profile-upload">
                        <label Bars for="inputFoto" style="display: flex; align-items: center; gap: 20px;">
                            <img src="https://i.imgur.com/6VBx3io.png" alt="Foto - Perfil" id="previewFoto">
                            <div class="upload-btn"><i class="fa-solid fa-camera"></i> Foto de Perfil(.png)</div>
                        </label>
                        <input type="file" name="foto" id="inputFoto" accept="image/png" style="display: none;">
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input type="text" name="nome" placeholder="Digite o nome completo" required>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="Apenas números (Ex: 00000000000)" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                        <div class="form-group">
                            <label>Idade</label>
                            <input type="number" name="idade" placeholder="Digite a idade" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" placeholder="Digite o e-mail" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Pessoa</label>
                            <select name="tipo" required>
                                <option value="">Selecione</option>
                                <option value="Estudante">Estudante</option>
                                <option value="Professor">Professor</option>
                                <option value="Servidor">Servidor</option>
                                <option value="Visitante">Visitante</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Curso</label>
                            <input type="text" name="curso" placeholder="Somente para estudantes">
                        </div>
                        <div class="form-group">
                            <label>Função</label>
                            <input type="text" name="funcao" placeholder="Somente professores e servidores">
                        </div>
                        <div class="form-group">
                            <label>Salário</label>
                            <input type="number" name="salario" step="0.01" placeholder="Somente professores e servidores">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 25px;">
                        <label>Observações</label>
                        <textarea name="observacoes" placeholder="Digite observações adicionais..."></textarea>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Salvar Cadastro</button>
                        <button type="reset" class="btn btn-secondary" id="btnLimpar"><i class="fa-solid fa-trash"></i> Limpar Campos</button>
                    </div>
                </form>
            </section>

            <section class="card">
                <h2 class="card-title">Pessoas Cadastradas</h2>
                <div class="search-box">
                    <input type="text" id="inputPesquisa" placeholder="Pesquisar pessoa cadastrada...">
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Tipo</th>
                                <th>Curso/Função</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="corpoTabela">

                            <?php
                            require_once 'conexao.php';

                            try {
                                $stmt = $pdo->query("SELECT * FROM pessoas ORDER BY id DESC");
                                $pessoas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if (count($pessoas) > 0) {
                                    foreach ($pessoas as $person) {
                                        $cursoFuncao = !empty($person['curso']) ? $person['curso'] : (!empty($person['funcao']) ? $person['funcao'] : 'N/A');
                                        $classeStatus = strtolower($person['tipo']);
                                        
                                        $fotoCaminho = (!empty($person['foto']) && file_exists("uploads/" . $person['foto'])) ? "uploads/" . $person['foto'] : "https://i.imgur.com/6VBx3io.png";

                                        echo "
                                        <tr>
                                            <td class='td-nome'>
                                                <img src='{$fotoCaminho}' alt='Foto' class='img-tabela'>
                                                <span>{$person['nome']}</span>
                                            </td>
                                            <td>{$person['cpf']}</td>
                                            <td><span class='status status-{$classeStatus}'>{$person['tipo']}</span></td>
                                            <td>{$cursoFuncao}</td>
                                            <td>Ativo</td>
                                            <td class='action-btns'>
                                                <a href='editar.php?id={$person['id']}' class='btn-edit' title='Editar'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </a>
                                                <a href='excluir.php?id={$person['id']}' class='btn-delete' title='Excluir' onclick='return confirm(\"Tem certeza que deseja excluir este registro?\")'>
                                                    <i class='fa-solid fa-trash'></i>
                                                </a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' style='text-align:center; padding:30px;'>Nenhuma pessoa cadastrada no banco de dados.</td></tr>";
                                }
                            } catch(PDOException $e) {
                                echo "<tr><td colspan='6' style='text-align:center; padding:30px; color: #f87171;'>Erro ao carregar dados: " . $e->getMessage() . "</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script>

        document.getElementById('inputPesquisa').addEventListener('keyup', function() {
            let filtro = this.value.toLowerCase();
            let linhas = document.querySelectorAll('#corpoTabela tr');

            linhas.forEach(function(linha) {
                let textoLinha = linha.textContent.toLowerCase();
                if (textoLinha.includes(filtro)) {
                    linha.style.display = '';
                } else {
                    linha.style.display = 'none';
                }
            });
        });

        const selectTipo = document.querySelector('select[name="tipo"]');
        const campoFuncao = document.querySelector('input[name="funcao"]');
        const campoSalario = document.querySelector('input[name="salario"]');
        const campoCurso = document.querySelector('input[name="curso"]');

        selectTipo.addEventListener('change', function() {
            const tipo = this.value;

            if (tipo === 'Estudante' || tipo === 'Visitante') {
                campoFuncao.disabled = true;
                campoFuncao.value = ''; 
                campoSalario.disabled = true;
                campoSalario.value = '';
            } else {
                campoFuncao.disabled = false;
                campoSalario.disabled = false;
            }

            if (tipo === 'Estudante') {
                campoCurso.disabled = false;
            } else {
                campoCurso.disabled = true;
                campoCurso.value = ''; 
            }
        });

        const inputFoto = document.getElementById('inputFoto');
        const previewFoto = document.getElementById('previewFoto');

        inputFoto.addEventListener('change', function() {
            const arquivo = this.files[0];
            if (arquivo) {
                if (arquivo.type !== "image/png") {
                    alert("Por favor, selecione apenas imagens no formato .png!");
                    this.value = "";
                    return;
                }
                const leitor = new FileReader();
                leitor.onload = function(e) {
                    previewFoto.src = e.target.result;
                }
                leitor.readAsDataURL(arquivo);
            }
        });

        document.getElementById('btnLimpar').addEventListener('click', function() {
            previewFoto.src = "https://i.imgur.com/6VBx3io.png";
        });

        const themeToggleBtn = document.getElementById('themeToggle');
        const themeIcon = themeToggleBtn.querySelector('i');
        const bodyElement = document.body;

        if (localStorage.getItem('tema_ifto') === 'claro') {
            bodyElement.classList.add('light-mode');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
        }

        themeToggleBtn.addEventListener('click', () => {

            bodyElement.classList.toggle('light-mode');

            if (bodyElement.classList.contains('light-mode')) {
                localStorage.setItem('tema_ifto', 'claro');
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                localStorage.setItem('tema_ifto', 'escuro');
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        });
    </script>
</body>
</html>