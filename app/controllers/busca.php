<?php

$app->get("/busca", function() use($app, $twig) {

	// busca
	$busca = $app->request()->get("busca");

	// objeto SecretariaDAO
	$secretariaDAO = new \app\models\SecretariaDAO();
	$secretarias = $secretariaDAO->listar(15, 0);
	$secretariasBusca = $secretariaDAO->pesquisar($busca);

	// objeto licitacaoDAO
	$licitacaoDAO = new \app\models\LicitacaoDAO();
	$licitacoes = $licitacaoDAO->pesquisar($busca);

	// objeto legislacaoDAO
	$legislacaoDAO = new \app\models\LegislacaoDAO();
	$legislacoes = $legislacaoDAO->pesquisar($busca);

	// objeto videoDAO
	$videoDAO = new \app\models\VideoDAO();
	$videos = $videoDAO->pesquisar($busca);

	// objeto noticiaDAO
	$noticiaDAO = new \app\models\NoticiaDAO();
	$noticias = $noticiaDAO->pesquisar($busca);

	// total de registros
	$registros = count($secretariasBusca) + count($licitacoes) + count($legislacoes) + count($videos) + count($noticias);

	$dados = array(
		"title" => "Pesquisar | ",
		"secretarias" => $secretarias,
		"busca" => $busca,
		"registros" => $registros,
		"secretariasBusca" => $secretariasBusca,
		"licitacoes" => $licitacoes,
		"legislacoes" => $legislacoes,
		"noticias" => $noticias,
		"videos" => $videos
	);

	$twig->loadTemplate("busca.html")->display($dados);

});