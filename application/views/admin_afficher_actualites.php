<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <h2>Actualites</h2>
    <table class='table'>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Original</th>
            </tr>
        </thead>
        <?php foreach($actualites as $une_actualite){ ?>
        <tr>
            <td>
                <?php echo $une_actualite['ACTUALITE_id']; ?>
            </td>
            <td>
                <?php echo $une_actualite['ACTUALITE_titre']; ?>
            </td>
            <td>
                <?php echo $une_actualite['ACTUALITE_description']; ?>
            </td>
            <td>
                <?php echo $une_actualite['ACTUALITE_date']; ?>
            </td>
            <td>
                <?php echo $une_actualite['ORIGINAL_titre']; ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td>
                <a hidden href="<?php echo base_url();?>index.php/Accueil/ajouter_actualites/<?php echo $admin[0]['LTQCLAC_login']; ?>">Ajouter une actualité</a>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
    </table>
