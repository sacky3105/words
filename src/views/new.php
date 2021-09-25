    <h2>My英単語の登録</h2>
    <?php if (count($errors)) : ?>
        <ul class="text-danger">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="create.php" method="POST">
        <div class="form-group">
            <label for="word">英単語</label>
            <input type="text" id="word" name="word" class="form-control" value="<?php echo $word['word'] ?>">
        </div>
        <div class="form-group">
            <label for="meaning">意味</label>
            <input type="text" id="meaning" name="meaning" class="form-control" value="<?php echo $word['meaning'] ?>">
        </div>
        <div class="form-group">
            <label for="purpose">使用用途</label>
            <textarea type="text" name="purpose" id="purpose" class="form-control" rows="10"><?php echo $word['purpose'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="other">その他</label>
            <textarea type="text" name="other" id="other" class="form-control" rows="10"><?php echo $word['other'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">登録する</button>
    </form>
    </body>

    </html>
