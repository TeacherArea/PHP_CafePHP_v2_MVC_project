<section id="register-user">
    <div class="accordion accordion-flush" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button init-tag collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    NOT A MEMBER? CREATE ACCOUNT HERE
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="index.php?page=user&amp;method=register" method="post"> <!-- inte till BlogController, utan routing till index.php -->
                        <input type="hidden" name="action" value="register">
                        <p><input aria-label="Create account: Firstname" class="init-input init-padding-16 init-border" type="text" placeholder="First name" required name="user-firstname"></p>
                        <p><input aria-label="Create account: Lastname" class="init-input init-padding-16 init-border" type="text" placeholder="Last name" required name="user-lastname"></p>
                        <p><input aria-label="Create account: Username" class="init-input init-padding-16 init-border" type="text" placeholder="Please choose your display name" required name="user-username"></p>
                        <p><input class="init-input init-padding-16 init-border" type="password" aria-label="Create account: Password" placeholder="Password" required name="user-password"></p>
                        <p><input class="init-input init-padding-16 init-border" type="email" aria-label="Create account: Mail" Create account placeholder="Mail" required name="user-mail"></p>
                        <p><input class="init-input init-padding-16 init-border" type="text" aria-label="Create account: Website" placeholder="Website (optional)" name="user-webb"></p>
                        <div class="form-check mb-4">
                            <input class="form-check-input" required type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                I agree to the Cafe PHP's terms and condition
                            </label>
                        </div>
                        <p><button class="init-button init-black" type="submit" name=create_user>CREATE ACCOUNT</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($registrationMessage)) : ?>
        <p class="init_user_message"><?php echo htmlspecialchars($registrationMessage); ?></p>
    <?php endif; ?>
</section>