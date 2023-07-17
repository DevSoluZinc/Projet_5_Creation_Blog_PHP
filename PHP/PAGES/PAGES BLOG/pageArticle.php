<?php
session_start();

?>


    <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\header.php') ; }} ?>

        <main class="container">
                    <h3 class="pb-4 mb-4 fst-italic border-bottom">
                        Tous les Articles
                    </h3>

                    <article class="blog-post">
                    <div class="row">
                       <?php 
                                 $count = 0; // compteur d'articles
                                     foreach ($articles as $article): 
                                          if ($count < 4): // afficher seulement les 4 premiers articles
                                                ?> 
                                                <div class="col">
                                                <div class="card" style=" font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif; font-weight:100; background: rgba(0,0,0,0.3); color: white;margin-bottom: 50px;">
                                                     <i class="fa-solid fa-pen-nib fa-2x" style="white"></i>
                                            <div class="card-body">
                                        <h5 class="card-title">
                                              <?= $article->title ?>
                                  </h5>
                                   <p class="card-text">
                                   <?= $article->date ?>
                                     </p>
                                         <a href="article.php?id=<?= $article->id ?>" class="btn btn-dark">Lire la suite</a>
                                                 </div>
                                                 </div>
                                    </div>
                                    </div>
<?php 
          endif;
          $count++;
        endforeach; 
    ?>
</div>
  <?php 
    if (count($articles) > 4): // afficher le bouton seulement si il y a plus de 4 articles
  ?>
  <div class="text-center mt-3">
    <a href="#" class="btn btn-dark" id="load-more-btn">Afficher plus d'articles</a>
  </div>
  <?php endif; ?>
                    </div>
                </article>
            </div>
    </div>
        </main>
        <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\footer.php') ; }} ?>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
<script src="app.js"></script>
<script>
  // code JavaScript pour gérer le chargement des articles supplémentaires
  var loadMoreBtn = document.getElementById('load-more-btn');
  var articlesContainer = document.querySelector('.row');
  var articles = <?= json_encode($articles) ?>;
  var count = 4; // commencer à partir du cinquième article

  loadMoreBtn.addEventListener('click', function() {
    for (var i = count; i < count + 2 && i < articles.length; i++) {
      var article = articles[i];
      var articleHtml = `
      <div class="col-12">
          <div class="card" style=" font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif; font-weight:100; background: rgba(0,0,0,0.3); color: white;margin-bottom:50px">
          <i class="fa-solid fa-pen-nib fa-2x" style="white"></i>
            <div class="card-body">
              <h5 class="card-title">
                ${article.title}
              </h5>
              <p class="card-text">
                ${article.date}
              </p>
              <a href="article.php?id=${article.id}" class="btn btn-dark">Lire la suite</a>
            </div>
        </div>
        </div>
      `;
      articlesContainer.innerHTML += articleHtml;
    }
    count += 2; // incrémenter le compteur pour les deux prochains articles
    if (count >= articles.length) {
      loadMoreBtn.style.display = 'none'; // cacher le bouton lorsque tous les articles ont été affichés
    }
  });
</script>
</html>