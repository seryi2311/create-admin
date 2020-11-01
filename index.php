<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/d813dffe7b.js" crossorigin="anonymous"></script>
    <title>business</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header_bottom">
          <div class="logo"><img class="logo_picture" src="images/logo.jpg" alt="picture"></div>
          <nav class="nav"><a class="nav_link nav_link-active" href="#">Главная</a><a class="nav_link" href="#about">О нас</a><a class="nav_link" href="#approach">Адреса</a><a class="nav_link" href="#">Вакансии</a>
          </nav>
        </div>
      </div>
    </header>
    <section class="hero">
     <a id="link" class="button button-yellow button-text-uppercase" target="_blank href="#">Перейти</a>
    </section>
    <section id="about" class="about">
      <div class="container">
        <div class="title title-bottom_line">
          <h2 class="title title_header">О нас</h2>
        </div>
        <ul class="about_list">
          <li class="utabo_item">
            <div class="icon icon-like"></div>
            <h3 class="about_header">Самая свежая выпечка</h3>
          </li>
          <li class="about_item">
            <div class="icon icon-book"></div>
            <h3 class="about_header">Торты ручной работы</h3>
          </li>
          <li class="about_item">
            <div class="icon icon-message"></div>
            <h3 class="about_header">Ароматный кофе</h3>
          </li>
        </ul>
      </div>
    </section>
    <section id="approach" class="approach">
      <div class="container">
        <div class="title title-bottom_line">
          <h2 class="title title_header">Наши преимущества</h2>
        </div>
        <ul class="approach_list">
          <li class="approach_item">
            <div class="approach_image"><img class="approach_picture" src="images/time.jpg">

            </div>
            <div class="approach_text">
              <div class="approach_title">Ваш заказ будет готов уже на следующий день</div>

            </div>
          </li>
          <li class="approach_item">
            <div class="approach_image"><img class="approach_picture" src="images/provider.jpg">

            </div>
            <div class="approach_text">
              <div class="approach_title">Только проверенные поставщики</div>

            </div>
          </li>

        </ul>
      </div>
    </section>
    <footer class="footer">
      <div class="footer_top">
        <div class="container">
          <div class="footer_title">Мы в социальных сетях</div>
          <div class="footer_links"><a class="footer_social" href="facebook.com"><i class="fa fa-facebook-official" aria-hidden="true"></i><span class="visually-hidden">facebook-official</span></a><a class="footer_social" href="twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i><span class="visually-hidden">twitter</span></a><a class="footer_social" href="google.com"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="visually-hidden">google-plus</span></a><a class="footer_social" href="linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="visually-hidden">linkedin</span></a>
          </div>
          <form action="#" method="post"></form>
          <div class="footer_field">
            <input class="footer_input" type="email" placeholder="Email Address">
          </div>
          <button class="button" type="submit">Subscribe</button>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="footer_copy">Cssauthor.com &copy; 2020 year</div>
      </div>
    </footer>

    <script>
        let elem = document.querySelector('#link');
        let str = navigator.userAgent;
        let link = 'https://www.google.ru/';
        if(str.indexOf('YaBrowser')!=-1){
           link = 'https://yandex.ru/';
        }
        elem.setAttribute('href', link);
    </script>
  </body>
</html>