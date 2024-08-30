<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotéis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card {
            height: 100%;
        }
        .carousel-item {
            height: 200px;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<!-- Barra de Navegação -->


<!-- Título Principal -->
<h2 class="text-center my-4">Hotéis</h2>

<!-- Filtros de Busca -->
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <select class="form-select" aria-label="Filtrar por cidade">
                <option selected>Filtrar por cidade</option>
                <option value="1">Ivaiporã</option>
                <option value="2">São Pedro do Ivaí</option>
                <option value="3">Apucarana</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" aria-label="Filtrar por preço">
                <option selected>Filtrar por preço</option>
                <option value="1">Até R$ 200</option>
                <option value="2">R$ 200 a R$ 400</option>
                <option value="3">Acima de R$ 400</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Filtrar</button>
        </div>
    </div>
</div>


<!-- Cards de Hotéis -->
<div class="container">
    <div class="row">
        <?php
        $hoteis = [
            [
                "nome" => "Vilhar Palace Hotel",
                "descricao" => "Ivaiporã",
                "imagens" => [
                    "https://lh3.googleusercontent.com/p/AF1QipMYOzibOC-DAZ2PsZkPxTNKsHven_yeK5rJLtgI=w287-h192-n-k-rw-no-v1",
                    "https://lh4.googleusercontent.com/proxy/m3_e4VbNKR0DWK8Y5YuIbEW0HXzhGLOjo1EPuqjhMgWBDU0fZhNxkd9VxB6BTQ1-D8CL63xNOk45rbwdHTjqDoQROxXoVt9B6LJG_r5gUU5Zyu5HcNEFHhR7Pdx5417tE7ruGd7NrOdphZaTU3MD3wvu8nxi0g=w252-h189-k-no",
                    "https://lh4.googleusercontent.com/proxy/4sy20aCeLDZQf8hC6npsjfrAZ-AK7XKMbGWhNT9ZPnDUCqxd-FhhnZ-Yur9nCA8b6WPFUj6tOvCMuY18A-BEIt9bjUlLuOUc0LlTGgZ8qaA4M0B0pBW5l-Ja_qJAT8kFSD7w5C3VANlyi621amnrLqbsi53OhhY=w252-h168-k-no"
                ],
                "preco" => "R$ 270,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Braz Hotel e Restaurante",
                "descricao" => "Um hotel econômico para estadias rápidas.",
                "descricao" => "São Pedro do Ivaí",
                "imagens" => [
                    "https://lh5.googleusercontent.com/p/AF1QipPZQuhSeLoqIxv9JpQZOljFcFuCNs-2FQVzHLY8=w253-h189-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipPXgXQy8WA2ZJLc8cPJxqdebX8kmX8a535lqGd_=w253-h189-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOXwpU8gfDU6yc9qKNLK_K_EetaobVhb_EnOn-J=w253-h337-k-no"
                ],
                "preco" => "R$ 150,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel do Vale",
                "descricao" => "Perfeito para famílias em férias.",
                "descricao" => "São João do Ivaí",
                "imagens" => [
                    "https://lh3.googleusercontent.com/p/AF1QipPKTFdrtua0FD2kmyd86BylEXylmu-H6ViywaHR=w287-h192-n-k-rw-no-v1",
                    "https://lh5.googleusercontent.com/p/AF1QipOqYgHc0orE0pROifqtLnBy0VzhO8tMXjJZNK_v=w252-h189-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOtFWqrIVG4Vw_mEYeXaqIiPtNICYg1fgklj_EK=w252-h239-k-no"
                ],
                "preco" => "R$ 300,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel e Restaurante Trevo",
                "descricao" => "Ideal para viagens de negócios.",
                "descricao" => "Faxinal.",
                "imagens" => [
                    "https://lh5.googleusercontent.com/p/AF1QipPsosJtKVLjkEXuFno8ZEpPjCTj8H7p_ydnf61r=w253-h162-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOohJFBIIsAiTC5CMuq7pPgXcDlzksuqgplkgc=w253-h142-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipMsAaXwdmYEJa0wKygOhQZKAhxDNufs9NM-mWaf=w253-h142-k-no"
                ],
                "preco" => "R$ 200,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel e Restaurante Poliani",
                "descricao" => "Um hotel boutique com charme único.",
                "descricao" => "Rio Branco do Ivaí",
                "imagens" => [
                    "https://lh5.googleusercontent.com/p/AF1QipOc3srqd5OPY8Ld0G8UoyoBxGlNkqBg0ivHo02U=w253-h449-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipP-3gSVgxVYk5zUnJr4s2mtdxM5OX_rgeCUKMBK=w253-h449-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOMRrLFy4P8AcYSJY-2BG6FRbI1iv7eZufc5SOk=w253-h337-k-no"
                ],
                "preco" => "R$ 400,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Mag Hotel",
                "descricao" => "Um resort com atividades para toda a família.",
                "descricao" => "Mauá da Serra",
                "imagens" => [
                    "https://lh5.googleusercontent.com/p/AF1QipPM_DgJM_UxiLiiRntm6z9-q1icmAI_3VnaaATp=w253-h316-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOXX8qZNpH1kN6fvRyVPKc2-Gm8jMpI2Bi1EdCE=w253-h312-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipO5fhtjPOOmcZTL931jEZ1seSaoDYEMJOK3Xp2J=w253-h189-k-no"
                ],
                "preco" => "R$ 600,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel Doral Apucarana",
                "descricao" => "Um resort com atividades para toda a família.",
                "descricao" => "Apucarana",
                "imagens" => [
                    "https://lh3.googleusercontent.com/proxy/V-H8tPxDxpz8bxVB1Zy6ysbCDBVZAWu-shdqeYk-XRyO7l3PS76sL_NN1nFVKzKXSzQEJ_cAUxczutXNxOUhnBF0zHBVPEmNAIetaEofcK8DN7lInhjzGKM4ruXZUdm3ZjVY62rQMo3xXAlXYj8lqAS0_ToefuQ=w253-h168-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipN58BRg6R6f-M6RcIsccrY28g8s33-640Q-lUIw=w253-h168-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNMFkMA4iwwTVP3dYwVSV9C0MaarXSsDzXjv8r1=w253-h168-k-no"
                ],
                "preco" => "R$ 600,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel Fazenda Água Azul",
                "descricao" => "Um resort com atividades para toda a família.",
                "descricao" => "Rio Bom",
                "imagens" => [
                    "https://lh5.googleusercontent.com/proxy/ECU5jvTN3h8VCNlNsp9nSq7MmqS3K94KX8vNIjjbXNam_8GmgFu3s5uAhIGXN3_KL-fXxu-Uq3WhYDyrtEnuSK8Q6z336vZNLS0vedxzvp52Smt5wavwWtkc6q81QC7CfD1iFOg_R1RycZLGjljtU3LkEbO2JT4=w253-h142-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipMPhTxR3ZJwHrYhcdQWOKcdRHF5MWHcegK61jA=w253-h189-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipM99AYXVY07og85n-7U_P-eUsISWagE4JR9tB9P=w253-h337-k-no"
                ],
                "preco" => "R$ 600,00 por noite",
                "link" => "#"
            ],
            [
                "nome" => "Hotel Fazenda Luar de Agosto",
                "descricao" => "Um resort com atividades para toda a família.",
                "descricao" => "Cruzmaltina",
                "imagens" => [
                    "https://lh5.googleusercontent.com/p/AF1QipPmxcPJjjBIwkaOMP2XFRhW9VzqHifrFWShjyrK=w253-h341-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNXdySfg525XO7AhAaZUthiFlURac6kryXZEG3h=k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOuT-BSGW1qnDNfn_EVhF1ilWBqj3uMOkK8onA9=w253-h142-k-no"
                ],
                "preco" => "R$ 600,00 por noite",
                "link" => "#"
            ],
            // (demais hotéis omitidos para brevidade, mas seguem o mesmo formato)
        ];

        foreach ($hoteis as $index => $hotel) {
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div id="carousel' . $index . '" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">';
            foreach ($hotel["imagens"] as $img_index => $imagem) {
                echo '
                <div class="carousel-item' . ($img_index === 0 ? ' active' : '') . '">
                    <img src="' . $imagem . '" class="d-block w-100" alt="' . $hotel["nome"] . '">
                </div>';
            }
            echo '
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $index . '" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $index . '" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">' . $hotel["nome"] . '</h5>
                        <p class="card-text">' . $hotel["descricao"] . '</p>
                        <p class="card-text"><strong>' . $hotel["preco"] . '</strong></p>
                        <a href="' . $hotel["link"] . '" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<!-- Seção de Avaliações -->
<div class="container my-5">
    <h3 class="text-center">Avaliações dos Hotéis</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">João Silva</h5>
                    <p class="card-text">Ótimo hotel, localização perfeita e ótimo atendimento!</p>
                    <p class="text-warning">★★★★★</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Maria Souza</h5>
                    <p class="card-text">Quarto confortável e ótimo custo-benefício.</p>
                    <p class="text-warning">★★★★☆</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Carlos Pereira</h5>
                    <p class="card-text">Café da manhã excelente, voltarei com certeza!</p>
                    <p class="text-warning">★★★★★</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Sobre nós</h5>
                <p>Encontre os melhores hotéis com as melhores ofertas.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links Úteis</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark">Promoções</a></li>
                    <li><a href="#!" class="text-dark">Contato</a></li>
                    <li><a href="#!" class="text-dark">Termos e Condições</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Redes Sociais</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark">Facebook</a></li>
                    <li><a href="#!" class="text-dark">Instagram</a></li>
                    <li><a href="#!" class="text-dark">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-light">
        © 2024 Hotéis
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>