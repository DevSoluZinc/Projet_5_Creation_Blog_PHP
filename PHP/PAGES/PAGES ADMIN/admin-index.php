    <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-header.php') ; }} ?>
            <main class="content">
                <div class="container-fluid" style="text-align: -webkit-center">
                    <h1 class="mb-3"> STATISTIQUES DU SITE BLOGPOST </h1>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <i class="fa-solid fa-comment fa-4x"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Nombre d'articles sur le site</h5>
                                    <p class="card-text" style="font-size: xxx-large;">
                                        <?= $total_articles ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Allez voir les articles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <i class="fa-solid fa-comment fa-4x"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Nombre d'articles sur le site ce mois-ci</h5>
                                    <p class="card-text" style="font-size: xxx-large;">
                                        <?= $articles_this_month ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Allez voir les articles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <i class="fa-solid fa-comment fa-4x"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de commentaire sur le site</h5>
                                    <p class="card-text" style="font-size: xxx-large;">
                                        <?= $total_comments ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Allez voir les commentaires</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <i class="fa-solid fa-comment fa-4x"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de commentaire sur le site ce mois-ci</h5>
                                    <p class="card-text" style="font-size: xxx-large;">
                                        <?= $comments_this_month ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Allez voir les commentaires</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-footer.php') ; }} ?>
