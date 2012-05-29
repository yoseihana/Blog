<?php

function listerArticleUrl()
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['lister'];
    $params['c'] = $validControllers['article'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function voirArticleUrl($id_article, $anchor = null)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['voir'];
    $params['c'] = $validControllers['article'];
    $params['id_article'] = $id_article;
    $suffix = (isset($anchor) && $anchor != null) ? '#' . $anchor : '';

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params) . $suffix;
}

function modifierArticleUrl($id_article)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['modifier'];
    $params['c'] = $validControllers['article'];
    $params['id_article'] = $id_article;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function ajouterArticleUrl()
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['ajouter'];
    $params['c'] = $validControllers['article'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function supprimerArticleUrl($id_article)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['supprimer'];
    $params['c'] = $validControllers['article'];
    $params['id_article'] = $id_article;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function listerCategorieUrl()
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['lister'];
    $params['c'] = $validControllers['categorie'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function voirCategorieUrl($id_categorie)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['voir'];
    $params['c'] = $validControllers['categorie'];
    $params['id_categorie'] = $id_categorie;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function modifierCategorieUrl($id_categorie)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['modifier'];
    $params['c'] = $validControllers['categorie'];
    $params['id_categorie'] = $id_categorie;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function supprimerCategorieUrl($id_categorie)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['supprimer'];
    $params['c'] = $validControllers['categorie'];
    $params['id_categorie'] = $id_categorie;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function ajouterCategorieUrl()
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['ajouter'];
    $params['c'] = $validControllers['categorie'];

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function ajouterCommentaireUrl($id_article)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['ajouter'];
    $params['c'] = $validControllers['commentaire'];
    $params['id_article'] = $id_article;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function modifierCommentaireUrl($id_commentaire)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['modifier'];
    $params['c'] = $validControllers['commentaire'];
    $params['id_commentaire'] = $id_commentaire;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}

function supprimerCommentaireUrl($id_commentaire)
{
    global $validActions, $validControllers;

    $params['a'] = $validActions['supprimer'];
    $params['c'] = $validControllers['commentaire'];
    $params['id_commentaire'] = $id_commentaire;

    return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
}