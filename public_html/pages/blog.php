<header class="bg-image-small init-display-container init-grayscale-min" id="home">
    <div class="init-display-bottomleft init-center init-padding-large init-hide-small">
        <span class="init-tag">Open from 6am to 5pm</span>
    </div>
    <div class="init-display-middle init-center">
        <h1><span class="init-text-white init-logo-text">Cafe&nbsp;PHP</span></h1>
    </div>
    <div class="init-display-bottomright init-center init-padding-large">
        <span class="init-text-white">15 Adr street, 5015</span>
    </div>
</header>

<main>
    <div class="init-sand init-grayscale init-large">
        <div class="init-container" id="where" style="padding-bottom:32px;">
            <div class="init-content" style="max-width:700px">

                <?php if (!$this->auth->isLoggedIn()) : ?>
                    <?php include 'register-user.php'; ?>
                    <?php include 'login-form.php'; ?>
                <?php endif; ?>

                <section id="post-articles">
                    <h2 class="init-center init-padding-48">
                        <span class="init-tag init-wide">CAFE PHP BLOG</span>
                    </h2>
                    <h3>Post a message</h3>
                    <form action="" target="_blank">
                        <p><input class="init-input init-padding-16 init-border" aria-label="Post a blog heading" type="text" placeholder="A heading" required name="blog-heading"></p>
                        <p><textarea class="init-input init-padding-16 init-border init-textarea" placeholder="Your blog post" aria-label="Post a blog message" name="blog-message"></textarea></p>
                        <p><button class="init-button init-black" type="submit">POST</button></p>
                    </form>
                </section>
                <section id="view-articles-comments">
                    <div class="init-container" id="about">
                        <div class="init-content">
                            <h2 class="init-center init-padding-64"><span class="init-tag init-wide">A blog post header</span>
                            </h2>
                            <p><?php echo $blogPosts; ?></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>