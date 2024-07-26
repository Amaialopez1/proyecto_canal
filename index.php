<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <!-- Ponemos un bs5, quitamos del header al script.
         2- Hacenos un formulario  para hacer el inicio de sesión  ---->
        <div style="height: 100dvh; display: flex; flex-direction: column; place-content: center;">
            <div class="container" style="border: 2px solid black; width:500px; text-align:center; padding:1rem;">
            <form name="login">
                <tr>
                    <th scope="row" style="align-content:center;"><h2>Usuario:</h2></th>
                    <td>
                        <span class="cnt">
                            <input name="usuario" type="text" class="usuario" size="20">
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row" style="align-content:center;"><h2>Email::</h2></th>
                    <td>
                        <span class="cnt">
                            <input name="password" type="text" class="password" size="20">
                        </span>
                    </td>
                </tr>
                <br><br>
                <span class="cnt">
                    <input type="button" value="entrar" class="btn btn-danger" onclick="Login()">
                </span>
                <span class="cnt">
                    <input type="reset" value="borrar" class="btn btn-danger">
                </span>
            </form>
        </div>
    </div>

    <script>
        function Login() {
            var usuario=document.login.usuario.value;
            var password=document.login.password.value;

            if(usuario=="amaia" && password=="amaia@formacion.es"){
                window.location="usuario2.php";
            }
        }
    </script>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
