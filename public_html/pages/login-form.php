<section id="blog-sign-in">
    <p class="mt-4"><strong>Sign in</strong> to comment/blog</p>

    <form action="index.php?page=user&amp;method=login" method="post">
        <input type="hidden" name="action" value="login">
        <p><input class="init-input init-padding-16 init-border" aria-label="Sign in with your email" type="email" placeholder="Username (email)" required name="user-mail"></p>
        <p><input class="init-input init-padding-16 init-border" type="password" placeholder="Password" aria-label="Sign in password" name="user-password"></p>
        <p><button class="init-button init-black" type="submit" name="log-in">SIGN IN</button></p>
    </form>
    <?php if (isset($loginMessage)) : ?>
        <p><?php echo htmlspecialchars($loginMessage); ?></p>
    <?php endif; ?>
</section>
