<h1 class="h2 text-dark mt-4 mb-4">My英単語一覧</h1>
<a href="new.php" class="btn btn-primary mb-4">英単語を登録する</a>
<main>
    <?php if (count($words) > 0) : ?>
        <?php foreach ($words as $word) : ?>
            <section class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title h4 mb-3">
                        <?php echo escape($word['word']); ?>
                    </h2>
                    <div>
                        意味：<?php echo escape($word['meaning']); ?>
                        使用用途：<?php echo escape($word['purpose']); ?>
                        その他：<?php echo escape($word['other']); ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>英単語が登録されていません。</p>
    <?php endif; ?>
</main>
