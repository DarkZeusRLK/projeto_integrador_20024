<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/dashboard_adm.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="javascript/script_navbar.js"></script>
    <script defer src="javascript/dashboard_adm.js"></script>
    <title>Dashboard Administrador</title>
</head>
<body>



        <main>
            <section class="dashboard-content">
                <div class="options">
                    <button id="btnUsuarios" onclick="showUsers()">Usuários</button>
                    <button id="btnHoteis" onclick="showHotels()">Hotéis</button>
                </div>

                
                <div id="usuariosTable" class="table-container">
                <h3 class="titulo-dashboard-adm">Usuários Cadastrados</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Imagem</th>
                                <th>Função</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>João Silva</td>
                                <td>joao@email.com</td>
                                <td><img src="Imagens/avatar.png" alt="Imagem do usuário" class="imagem-dashboard-adm"></td>
                                <td>Usuário</td>
                                <td>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Maria Souza</td>
                                <td>maria@email.com</td>
                                <td><img src="Imagens/avatar.png" alt="Imagem do usuário" class="imagem-dashboard-adm"></td>
                                <td>Usuário</td>
                                <td>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabela de Hotéis -->
                <div id="hoteisTable" class="table-container" style="display:none;">
                    <h3 class="titulo-dashboard-adm">Hotéis Cadastrados</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Imagem</th>
                                <th>Função</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hotel Ivaí</td>
                                <td>contato@hotelivai.com</td>
                                <td><img src="Imagens/avatar.png" alt="Imagem do hotel" class="imagem-dashboard-adm"></td>
                                <td>Hotel</td>
                                <td>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Hotel Central</td>
                                <td>contato@hotelcentral.com</td>
                                <td><img src="Imagens/avatar.png" alt="Imagem do hotel" class="imagem-dashboard-adm"></td>
                                <td>Hotel</td>
                                <td>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>

        
    </div>


</body>
</html>