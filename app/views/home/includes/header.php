<header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">TO-DO</span>
            </a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="/blog/public/home/index/">Главная страница</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/blog/public/home/create/">Создать</a>
            <?php if (!isset($_SESSION['authorized'])){?>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/blog/public/login/index/">Войти</a>
            <?php }else { ?>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/blog/public/login/signOut/">Выйти</a>
            <?php } ?>
            </nav>
        </div>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">TO-DO</h1>
            <p class="fs-5 text-muted">

            </p>
        </div>
</header>
