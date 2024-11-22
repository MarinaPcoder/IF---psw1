<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Testando Formulários 🎵</title>
    <link rel="stylesheet" href="styles.css">
   <link rel="shortcut icon" href="./imagens/favicon-site-musica.png">
</head>
<body>

    <header class="header-titulo">
        <h1>Em um site de Música!!</h1>
    </header>

    <nav class="nav-barra">
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#noticias">Noticias</a></li>
            <li><a href="#contato">Contato</a></li>
            <li><a href="#sobre">Sobre</a></li>
        </ul>
    </nav>

    <section class="conteudo-principal">
        <div class="texto-conteudo">
            <h2>Os Questionários!</h2>
            <p>
                Os questionários têm como objetivo identificar suas preferências musicais, hábitos de consumo e momentos em que você mais aprecia música. A partir dessas informações, buscamos proporcionar uma compreensão mais aprofundada sobre seu perfil musical, incentivando a conexão com estilos, artistas e formatos que mais combinam com você.
            </p>
        </div>
        <div class="imagem-texto">
            <img src="./imagens/imagem-site-musica.jpg" alt="Imagem ilustrativa">
        </div>
    </section>


    <main>
        <div class="formulario">
            <section id="cadastro" class="form-secao">

                <h2>Cadastro</h2>
                <form>
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu email" required>

                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>

                    <label for="nascimento">Data de nascimento:</label>
                    <input type="date" id="nascimento" name="nascimento" required>

                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>

                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Rua, número, bairro" required>

                    <label for="genero">Gênero:</label>
                    <select id="genero" name="genero" required>
                        <option value="" disabled selected>Escolha uma opção</option>
                        <option value="feminino">Feminino</option>
                        <option value="masculino">Masculino</option>
                        <option value="outro">Outro</option>
                    </select>

                    <label for="estado-civil">Estado Civil:</label>
                    <select id="estado-civil" name="estado-civil">
                        <option value="" disabled selected>Selecione</option>
                        <option value="solteiro">Solteiro(a)</option>
                        <option value="casado">Casado(a)</option>
                        <option value="divorciado">Divorciado(a)</option>
                        <option value="viuvo">Viúvo(a)</option>
                    </select>

                    <label for="imagem">Carregar imagem:</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*">

                    <label>
                        <input type="checkbox" name="consentimento" required>
                           Eu concordo com os <a href="https://www.iubenda.com/pt-br/gerador-termos-e-condicoes?utm_source=adwords&utm_medium=ppc&utm_campaign=aw_general_brazil&utm_term=termos%20e%20condi%C3%A7%C3%B5es&utm_content=594046753369&gad_source=1&gclid=CjwKCAiArva5BhBiEiwA-oTnXaTmSCfeZPq_PXP_OgEgUlgzqx9KPWmHIOkkPuXH4Ix9ovovSpfm9BoCryIQAvD_BwE" target="_blank">termos e condições</a>.
                    </label>

                    <button type="submit">Cadastrar</button>
                </form>
            </section>




            <section id="preferencias" class="form-secao">
               
                <h2>Preferências Musicais</h2>
                <form>

                    <div>
                        <h4>Quais são seus gêneros musicais favoritos?</h4>
                        <label>
                            <input type="checkbox" name="genero" value="rock"> Rock
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="pop"> Pop
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="jazz"> Jazz
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="eletronica"> Eletrônica
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="hiphop"> Hip Hop
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="mpb"> MPB
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="classica"> Clássica
                        </label>
                        <label>
                            <input type="checkbox" name="genero" value="reggae"> Reggae
                        </label>
                    </div>

                    <div>
                        <h4>Quais são seus artistas ou bandas favoritas?</h4>
                        <label for="artistaebanda">
                            <input type="text" name="artista_banda" placeholder="Ex: The Beatles, Adele, etc.">
                        </label>
                    </div>
        
                    <div>
                        <h4>Em quais momentos você costuma ouvir música?</h4>
                        <label>
                            <input type="checkbox" name="momento_musical" value="trabalho"> Durante o trabalho
                        </label>
                        <label>
                            <input type="checkbox" name="momento_musical" value="exercicio"> Durante o exercício
                        </label>
                        <label>
                            <input type="checkbox" name="momento_musical" value="descanso"> Durante o descanso
                        </label>
                        <label>
                            <input type="checkbox" name="momento_musical" value="festas"> Em festas
                        </label>
                    </div>
            
                    <div>
                        <h4>Com que frequência você ouve música?</h4>
                        <label>
                            <input type="radio" name="frequencia" value="diario"> Diariamente
                        </label>

                        <label>
                            <input type="radio" name="frequencia" value="semanal"> Semanalmente
                        </label>

                        <label>
                            <input type="radio" name="frequencia" value="ocasional"> Ocasionalmente
                        </label>

                        <label>
                            <input type="radio" name="frequencia" value="raramente"> Raramente
                        </label>

                    </div>
                </form>
            </section>
        </div>
    <main>   

 <footer>
    <p>© 2024 Fazendo Formulários.Todos os direitos reservados a mim mim mim!</p>
 </footer>
    
</body>
</html>