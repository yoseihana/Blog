<?php

function findCommentById($id_commentaire)
{
    global $connex;

    $req = 'SELECT * FROM commentaire WHERE id_commentaire = :id_commentaire';

    try
    {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_commentaire', $id_commentaire);
        $ps->execute();

        $commentaire = $ps->fetch();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $commentaire;
}

function findCommentsByIdArticle($id_article)
{
    global $connex;

    $req = 'SELECT * FROM commentaire WHERE id_article = :id_article';

    try
    {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_article', $id_article);
        $ps->execute();

        $commentaires = $ps->fetchAll();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $commentaires;
}

function deleteComment($id_commentaire)
{

    global $connex;
    $req = 'DELETE FROM commentaire WHERE id_commentaire = :id_commentaire';

    try
    {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_commentaire', $id_commentaire);
        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }

    return true;
}

function updateComment($data)
{
    global $connex;

    $req = 'UPDATE commentaire SET nom_auteur = :nom_auteur, texte = :texte WHERE id_commentaire = :id_commentaire';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_commentaire', $data['commentaire']['id_commentaire']);
        $ps->bindValue(':nom_auteur', $data['commentaire']['nom_auteur']);
        $ps->bindValue(':texte', $data['commentaire']['texte']);
        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;
}

function addComment($data)
{
    global $connex;

    $req1 = 'INSERT INTO commentaire VALUE ( null, :nom_auteur, :texte, :date, :id_article)';
    $req2 = 'UPDATE article SET nb_commentaire = nb_commentaire+1 WHERE id_article = :id_article';

    try
    {
        $connex->beginTransaction();

        $ps = $connex->prepare($req1);
        $ps->bindValue(':nom_auteur', $data['commentaire']['nom_auteur']);
        $ps->bindValue(':texte', $data['commentaire']['texte']);
        $ps->bindValue(':date', $data['commentaire']['date']);
        $ps->bindValue(':id_article', $data['commentaire']['id_article']);
        $ps->execute();

        $ps = $connex->prepare($req2);
        $ps->bindValue(':id_article', $data['commentaire']['id_article']);
        $ps->execute();

        $connex->commit();

    }
    catch (PDOException $e)
    {

        $connex->rollBack();
        die($e->getMessage());
    }
}

function countCommentById($id_commentaire)
{
    global $connex;

    $req = 'SELECT count(id_commentaire) AS nb_id_commentaire FROM commentaire WHERE id_commentaire = :id_commentaire';

    try
    {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_commentaire', $id_commentaire);
        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbId = $ps->fetch();

    return $nbId['nb_id_commentaire']; // retourne 0 ou 1
}