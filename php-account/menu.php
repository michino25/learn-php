<div class=menu>
    <a class="signin" href="dangki.php">Đăng Kí</a>
    <a class="signup" href="dangnhap.php">Đăng Nhập</a>
    <a class="signout" href="dangxuat.php">Đăng Xuất</a>
</div>

<script>
    var signOut = document.querySelector('.signout');

    function disable() {
        signOut.classList.add('disabled');
        signOut.disabled = true;
    }

    function able() {
        signOut.classList.remove('disabled');
        signOut.disabled = false;
    }

    if (<?php echo isset($_SESSION['account']) ?>)
        signOut.onclick = able;
    else
        signOut.onclick = disable;
</script>

<style>
    a {
        color: white;
        background-color: deepskyblue;
        display: inline-block;
        padding: 12px 16px;
        text-decoration: none;
    }

    a:hover {
        opacity: 0.8;
    }

    .disabled {
        opacity: 0.5;
        cursor: context-menu;
    }

    .disabled:hover {
        opacity: 0.5;
        cursor: context-menu;
    }
</style>