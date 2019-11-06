<div id="profile">
    <br />
    <br />
    <br />
    <br />
    
    
    <section class="order_details section_gap">
        <h2>Point de retraits</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($pointretraits as $unpointretrait) { ?>
                <tr>
                    <td>
                        <p>
                            <?php echo $unpointretrait["POINT_RETRAIT_id"] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $unpointretrait["POINT_RETRAIT_nom"] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $unpointretrait['POINT_RETRAIT_adresse']?>
                        </p>
                        
                    </td>
                    <td>
                        <?php echo form_open("Accueil/admin_voir_commandes_point_retrait");?>
                        <input hidden name="point_retrait_id" value="<?php echo $unpointretrait["POINT_RETRAIT_id"]; ?>">
                        <input hidden name="admin_login" value="<?php echo $admin[0]['LTQCLAC_login']; ?>">

                        <input type="submit" name="insert" value="Voir commandes associées" class="btn" />
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>
</body>

</html>