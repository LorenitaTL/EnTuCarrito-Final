<?php
//VISTAS
Route::get("/", ControladorComercios::class);
Route::get("/listar_comercios", ControladorComercios::class);
Route::get("/listar_comercios/jerez", ControladorComercios::class."@listarComerciosAdmin");
Route::get("/listar_comercios/public", ControladorComercios::class."@listarComerciosView");
Route::get("/comercios/form/crear", ControladorComercios::class."@formCrearComercio");

//RECURSOS
Route::post("/comercios/registrar", ControladorComercios::class."@insertarComercio");