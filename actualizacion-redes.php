<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Incios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Cabin+Sketch&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Ventex</h1>
    </header>
    
    <section id="title">
        <br><br>
        
    </section>
    
    <main id="main2">
        <aside id="for2">
            <br><br>
            <form action="actualizacion-redesph.php" method="post" class="form">
                <h2 class="title" >Actualizacion de datos</h2>
                    <div class="flex">
                        <input type="hidden" name="ideup"  value="<?php echo $_SESSION['id'] ?>"><p><?php echo $_SESSION['id'] ?></p>
                </div>  
                <label>  
                    <input class="input" type="text" name="profileD" placeholder="" required>
                    <span>Decripcion</span>
                </label>
                <label>
                    <input class="input" type="text" name="WhatsAppup" placeholder="" required>
                    <span>WhatsApp</span>
                </label>
                <label>
                    <input class="input" type="text" name="x" placeholder="" required>
                    <span>X</span>
                </label>
                <label>
                    <input class="input" type="text" name="Instagram" placeholder="" required>
                    <span>Instagram</span>
                </label>
                <label>
                    <input class="input" type="text" name="Contactdescription" placeholder="" required>
                    <span>Informacion de contacto</span>
                </label>
                <label>
                    <input class="input" type="text" name="facebook" placeholder="" required>
                    <span>Facebook</span>
                </label>
                    <input type="submit" value="Actualizar"  class="submit">
                    
            </form>
        </aside>
    </main>
</body>
</html>