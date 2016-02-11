<?php

class Registration_form
{

    private $username;
    private $email;
    private $password;
    private $password_again;
    private $first_name;

    function __construct()
    {
        add_shortcode('registration_form', array($this, 'shortcode'));
    }


    public function registration_form()
    {

        ?>

        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <div class="login-form">
                <!--////////////////////////////////-->
                <p class="necessarily"><span class="mag">*</span> Обязательное поле</p>
                <div class="registration--left">
                    <label for="reg-fname">Имя *</label>
                    <input name="reg_fname" type="text" class="registration--inp form-control login-field"
                           value="<?php echo(isset($_POST['reg_fname']) ? $_POST['reg_fname'] : null); ?>"
                           placeholder="Введите имя ..." id="reg-fname"/>
<!--                    <input type="text" class="registration--inp" id="registration--name" name="registration--name" placeholder="Введите имя ...">-->
                    <label for="reg-name">Логин *</label>
                    <input name="reg_name" type="text" class="registration--inp form-control login-field"
                           value="<?php echo(isset($_POST['reg_name']) ? $_POST['reg_name'] : null); ?>"
                           placeholder="Введите логин ..." id="reg-name" required/>
<!--                    <input type="text" class="registration--inp"  id="registration--login" name="registration--login" placeholder="Введите логин ...">-->
                    <label for="reg-email">Адрес электронной почты *</label>
                    <input name="reg_email" type="email" class="registration--inp form-control login-field"
                           value="<?php echo(isset($_POST['reg_email']) ? $_POST['reg_email'] : null); ?>"
                           placeholder="Введите адрес электронной почты ..." id="reg-email" required/>

<!--                    <input type="password" class="registration--inp" id="registration--pas" name="registration--pas" placeholder="Введите пароль ...">-->
                </div>
                <div class="registration--right">
                    <label for="reg-pass">Пароль *</label>
                    <input name="reg_password" type="password" class="registration--inp form-control login-field"
                           value="<?php echo(isset($_POST['reg_password']) ? $_POST['reg_password'] : null); ?>"
                           placeholder="Введите пароль ..." id="reg-pass" required/>
                    <label for="reg-pass-2">Повторите пароль *</label>
                    <input name="reg_password-2" type="password" class="registration--inp form-control login-field"
                           value="<?php echo(isset($_POST['reg_password-2']) ? $_POST['reg_password-2'] : null); ?>"
                           placeholder="Введите пароль ..." id="reg-pass-2" required/>
<!--                    <input type="password" class="registration--inp" id="registration--pas-2" name="registration--pas-2" placeholder="Введите пароль ...">-->

<!--                    <input type="email" class="registration--inp" id="registration--mail" name="registration--mail" placeholder="Введите адрес электронной почты ...">-->

                    <div class="registration--btns">
                        <input class="registration--btns--regist" type="submit" name="reg_submit" value="Регистрация"/>
<!--                        <input type="button" value="Регистрация" class="registration--btns--regist">-->
                        <small>или</small>
                        <a href="/" class="registration--btns--exit">Отмена</a>
                    </div>
                </div>
                <!--////////////////////////////////////-->
            </div>
        </form>

        <?php
    }

    function validation()
    {

        if ((empty($this->username) || empty($this->password) || empty($this->email)) && ($this->password == $this->password_again)) {
            return new WP_Error('field', 'Заполните все поля');
        }

        if (strlen($this->username) < 4) {
            return new WP_Error('username_length', 'Логин слишком короткий. Введите минимум 4 буквы');
        }

        if (strlen($this->password) < 5) {
            return new WP_Error('password', 'Длина пароля должна быть более 5 символов');
        }

        if ( $this->password != $this->password_again) {
            return new WP_Error('password_check', 'Введенные пароли не совпадают');
        }

        if (!is_email($this->email)) {
            return new WP_Error('email_invalid', 'Неправильная почта');
        }

        if (email_exists($this->email)) {
            return new WP_Error('email', 'Почта уже зарагестрирована!');
        }


        $details = array('Логин' => $this->username
        );

        foreach ($details as $field => $detail) {
            if (!validate_username($detail)) {
                return new WP_Error('name_invalid', 'Извините, поле "' . $field . '"  неверное');
            }
        }

    }

    function registration()
    {

        $userdata = array(
            'user_login' => esc_attr($this->username),
            'user_email' => esc_attr($this->email),
            'user_pass' => esc_attr($this->password),
            'first_name' => esc_attr($this->first_name),
        );

        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        } else {
            $register_user = wp_insert_user($userdata);
            if (!is_wp_error($register_user)) {

                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-success">';
                echo '<strong>Спасибо за регистрацию.</strong>';
                echo '</div>';
            } else {
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>' . $register_user->get_error_message() . '</strong>';
                echo '</div>';
            }
        }

    }

    function shortcode()
    {

        ob_start();

        if ($_POST['reg_submit']) {
            $this->username = $_POST['reg_name'];
            $this->email = $_POST['reg_email'];
            $this->password = $_POST['reg_password'];
            $this->password_again = $_POST['reg_password-2'];
            $this->first_name = $_POST['reg_fname'];

            $this->validation();
            $this->registration();
        }

        $this->registration_form();
        return ob_get_clean();
    }

}

new Registration_form;