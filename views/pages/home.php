

<div class="container">  
    <form id="passwordGenFom" action="index.php" method="post">
        <h3>Type number of symbols</h3>
        <fieldset>
            <input type="number" tabindex="1" name="passwordLenght" required autofocus min="4">
        </fieldset>
        <fieldset class="checkBox">

            <input type="checkbox" name="number" value="number" /> Password contains numbers <br />
            <input type="checkbox" name="lettersCapital" value="lettersCapital" /> Password contains capital letters<br />
            <input type="checkbox" name="letters" value="letters" /> Password contains letters<br />

        </fieldset>

        <fieldset>
            <button name="submit" type="submit">Submit</button>
        </fieldset>
    </form>
    <div class="password">
        <?php echo $list; ?>
    </div>
</div>


