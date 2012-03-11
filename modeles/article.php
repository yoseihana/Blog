<?php

function getAllArticles()
{
    global $connex;

    $req = 'SELECT * FROM article ORDER BY date_parution DESC';

    try
    {
        $res = $connex->query($req);
        $articles = $res->fetchAll();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $articles;
}

function findArticleById($id_article)
{
    global $connex;

    $req = 'SELECT * FROM article WHERE id_article = :id_article';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_article', $id_article);
        $ps->execute();

        $article = $ps->fetch();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }

    return $article;
}

function deleteArticle($data)
{

    global $connex;
    $req = 'DELETE FROM article WHERE id_article = :id_article';

    try
    {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_article', $data['article']['id_article']);
        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }

    return true;
}

function updateArticle($data)
{

    global $connex;

    $req = 'UPDATE article SET titre = :titre, article = :article WHERE id_article = :id_article';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_article', $data['article']['id_article']);
        $ps->bindValue(':titre', $data['article']['titre']);
        $ps->bindValue(':article', $data['article']['article']);

        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;
}

function addArticle($data)
{
    global $connex;

    $req = 'INSERT INTO article VALUES ( null, :titre, :article, :date_parution, 0)';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':titre', $data['article']['titre']);
        $ps->bindValue(':article', $data['article']['article']);
        $ps->bindValue(':date_parution', $data['article']['date_parution']);
        $ps->execute();

    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;

}

function countArticleById($id_article)
{
    global $connex; // récupérer la connection
    $req = 'SELECT count(id_article) AS nb_id_article FROM article WHERE id_article = :id_article'; // récupère le nbre d'isbn

    try
    {
        $ps = $connex->prepare($req); // connection
        $ps->bindValue(':id_article', $id_article); //les valeurs sont liées
        $ps->execute(); // execution
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbidArticle = $ps->fetch();

    return $nbidArticle['nb_id_article']; // retourne 0 ou 1
}