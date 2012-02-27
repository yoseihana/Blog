<?php

function getList()
{
    global $connex;

    $req = 'SELECT * FROM commentaire ORDER BY id_article';

    try {
        $res = $connex->query($req);
        $commentaire = $res->fetchAll();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $commentaire;

    $req = 'SELECT * FROM article ORDER BY id_article';

    try {
        $res = $connex->query($req);
        $article = $res->fetchAll();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $article;
}

function getOne($id_commentaire)
{
    global $connex;

    $req = 'SELECT * FROM commentaire WHERE id_commentaire = :id_commentaire';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_commentaire', $id_commentaire);
        $ps->execute();

        $commentaire = $ps->fetch();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $commentaire;
}

function delete($data)
{

    global $connex;
    $req = 'DELETE FROM commentaire WHERE id_commentaire = :id_commentaire';

    try {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_commentaire', $data['id_commentaire']);
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

    $req = 'UPDATE commentaire SET nom_auteur = :nom_auteur, texte = :texte WHERE id_commentaire = :id_commentaire';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_commentaire', $data['id_commentaire']);
        $ps->bindValue(':nom_auteur', $data['nom_auteur']);
        $ps->bindValue(':texte', $data['texte']);
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
    global $connex;

    $req = 'INSERT INTO commentaire VALUE ( :id_commentaire, :nom_auteur, :texte, :date)';

    try {
        $ps = $c->prepare($req);

        $ps->bindValue(':id_commentaire', $data['id_commentaire']);
        $ps->bindValue(':nom_auteur', $data['nom_auteur']);
        $ps->bindValue(':texte', $data['texte']);
        $ps->bindValue(':date', $data['date']);

        $ps->execute();

        $livre = $ps->fetch();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

    return $commentaire;
}

function getidCommentaireCount($id_commentaire)
{
    global $connex;
    $req = 'SELECT count(id_commentaire) AS nb_id_commentaire FROM commentaire WHERE id_commentaire = :id_commentaire';

    try {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_commentaire', $id_commentaire);
        $ps->execute(); // execution
    }
    catch (PDOException $e) {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbidCommentaire = $ps->fetch();
    $nbidCommentaire = $nbidCommentaire['nb_id_commentaire'];

    return $nbidCommentaire['nb_id_commentaire'];
}