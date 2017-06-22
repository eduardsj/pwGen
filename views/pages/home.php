

<div class="container">  
    <form id="passwordGenFom" action="index.php" method="post">
        <h3>Type number of symbols</h3>
        <fieldset>
            <input type="number" tabindex="1" name="passwordLenght" required autofocus min="4">
        </fieldset>
        <fieldset class="checkBox">

            <input type="checkbox" name="number" value="number" /> Password include 0 or 1 <br />
            <input type="checkbox" name="letter" value="letter" /> Password include o or O<br />
            <input type="checkbox" name="exclude" value="exclude" /> Definitely have l letter<br />

        </fieldset>

        <fieldset>
            <button name="submit" type="submit">Submit</button>
        </fieldset>
    </form>
    <div class="password">
        <?php echo $list; ?>
    </div>
</div>


