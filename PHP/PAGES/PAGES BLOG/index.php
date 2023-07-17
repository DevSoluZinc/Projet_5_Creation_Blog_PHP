    
  <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\header.php') ; }} ?>
      <?php if (isset($_GET['success']) && $_GET['success'] == 'true') { ?>
    <div class="alert alert-success" role="alert">
        Le message a été envoyé avec succès !
    </div>
<?php } ?>
<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
      Derniers articles
      </h3>

      <article class="blog-post">
      <?php foreach (array_slice($articles, -3) as $article): ?>
                        <div class="col sm-col-12 d-mb-3 sm-mb-3 mb-3">
                            <div class="card" style="font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
                            font-weight:100; 
                            background: rgba(0,0,0,0.3);
                            color: white;">
                                <i class="fa-solid fa-pen-nib fa-2x" style="white"></i>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $article->title ?>
                                    </h5>
                                    <p class="card-text">
                                    <p>
                                        <?= isset($article->content) ? substr($article->content, 0, 30) : '' ?>
                                    </p>
                                    <?= $article->date ?>
                                    </p>
                                    <a href="article.php?id=<?= $article->id ?>" class="btn btn-dark">Lire la suite</a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                    
                    <a href="pageArticle.php" style="font-family: Agenda-Light, Agenda Light, Agenda, 
                    Arial Narrow, sans-serif;
                    font-weight:100; 
                    background: rgba(0,0,0,0.3);
                    color: white;width:100%;    margin-bottom: 50px;" class="btn">Pour voir tous les articles</a>


      </article>
        <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\VIEWS\MAIL\AddMail.php') ; }} ?>
    </div>

    <div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">A propos</h4>
            <img src="\Projet_5_Creation_Blog_PHP_V2\PHP\PUBLIC\UserPhoto\Maxence.jpg" alt="Logo" class="img-fluid mb-3" />
            <p class="mb-0">Maxence Medard, le développeur passionné qui transforme vos idées en réalité !</p>
        </div>
    </div>
</div>
</main>

<?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\footer.php') ; }} ?>

