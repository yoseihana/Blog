<?php

function getList()
{
    global $connex;

    $req = 'SELECT * FROM article ORDER BY date_parution DESC';

    try {
        $res = $connex->query($req);
        $article = $res->fetchAll();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $article;
}

function getOne($id_article)
{
    global $connex;

    $req = 'SELECT * FROM article WHERE id_article = :id_article';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_article', $id_article);
        $ps->execute();

        $article = $ps->fetch();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $article;
}

function delete($data)
{

    global $connex;
    $req = 'DELETE FROM article WHERE id_article = :id_article';

    try {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_article', $data['id_article']);
        $ps->execute();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

    return true;
}

function update($data)
{

    global $connex;

    $req = 'UPDATE article SET titre = :titre, article = :article WHERE id_article = :id_article';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_article', $data['id_article']);
        $ps->bindValue(':titre', $data['titre']);
        $ps->bindValue(':article', $data['article']);

        $ps->execute();
    }
    catch (PDOException $e) {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;
}

function add()
{


    if (!getidArticleCount($_POST['id_article'])) {
        global $connex;

        $req = 'INSERT INTO article VALUES (:id_article, :titre, :article, :date_parution, :commentaire);';
        // $req2 = 'INSERT INTO ecrit VALUES (:isbn, :id_auteur)';


        try {
            $ps = $connex->prepare($req);

            $ps->bindValue(':id_article', $_POST['id_article']);
            $ps->bindValue(':titre', $_POST['titre']);
            $ps->bindValue(':article', $_POST['article']);
            $ps->bindValue(':date_parution', $_POST['date_parution']);
            $ps->bindValue(':commentaire', $_POST['commentaire']);
            $ps->execute();

            /* $ps = $connex->prepare($req2);
              $ps->bindValue(':isbn', $_POST['isbn']);
              $ps->bindValue(':id_auteur', $_POST['id_auteur']);
              $ps->execute(); */
        }
        catch (PDOException $e) {
            die($e->getMessage());
            //header('Location: index.php?c=error&a=e_database');
        }

        return true;
    }
    else {
        return false;
    }
}

function getidArticleCount($id_article)
{
    global $connex; // récupérer la connection
    $req = 'SELECT count(id_article) AS nb_id_article FROM article WHERE id_article = :id_article'; // récupère le nbre d'isbn

    try {
        $ps = $connex->prepare($req); // connection
        $ps->bindValue(':id_article', $id_article); //les valeurs sont liées
        $ps->execute(); // execution
    }
    catch (PDOException $e) {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbidArticle = $ps->fetch();
    $nbidArticle = $nbidArticle['nb_id_article']; // extraction du nbre de ISBN trouver

    return $nbidArticle['nb_id_article']; // retourne 0 ou 1
}