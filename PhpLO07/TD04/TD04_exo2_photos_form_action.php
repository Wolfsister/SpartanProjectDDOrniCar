<!DOCTYPE html>

<html>
    <head>
        <title>TD04_exo2_photos_form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
        <h2>Laissez vos coordonnées !</h2>
        <form method="post" enctype="multipart/form-data" action = 'TD04_exo2_photos_action.php'>
            <p/><label>Nom</label>
            <input type="text" name="nom" />
            <p/><label>Prénom</label>
            <input type="text" name="prenom" value="Denis" />
            <p/><label>Email</label>
            <input type="text" name="email" />
            <p/><label>Image1</label>
            <input type="file" accept="image/*" name="image1" />
            <p/><label>Image2</label>
            <input type="file" accept="image/*" name="image2" />
            <p/><label>Image3</label>
            <input type="file" accept="image/*" name="image3" />

            <p/><input type="submit" name="Valider">
            <input type="reset" name="Reset">
        </form>
        </div>
    </body>
</html>
