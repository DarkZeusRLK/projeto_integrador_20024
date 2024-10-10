<nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="../Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../index/index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li><a href="../user/conta.php?id=<?php echo $_SESSION['id_usuario'];?>"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['nome'])): ?>
                    <li><a href="../user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <li><a href="../page/contato.php"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador'): ?>
                    <li><a href="../admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li class="nav-item logout">
                        <a href="../static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="../page/desenvolvedores.php" class="nav-link" id="settings-icon">
                        <i class="fas fa-code"></i> <!-- Ícone de desenvolvedor -->
                        <span>Desenvolvedores</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../user/configuracoes.php" class="nav-link" id="settings-icon">
                        <i class="fas fa-cog"></i><span>Configurações</span>
                    </a>
                </li>
            </ul>
        </nav>