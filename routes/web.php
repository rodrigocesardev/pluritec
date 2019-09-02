<?php
Route::resource('/consulta', 'Painel\AlunoController@consulta');

Route::resource('/painel/alunos','Painel\AlunoController');
Route::resource('/painel/cursos','Painel\CursoController');
Route::resource('/painel/matriculas','Painel\MatriculaController');



//Route::get('/aluno', 'Painel\AlunoController@index');
//Route::get('/curso', 'Painel\CursoController@index');
//Route::get('/matricula', 'Painel\MatriculaController@index');

