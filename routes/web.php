<?php
//VISTAS
Route::get("/", ControladorComercios::class);
Route::get("/listar_comercios", ControladorComercios::class);
Route::get("/comercios/form/crear", ControladorComercios::class."@formCrearComercio");

//RECURSOS
Route::post("/comercios/registrar", ControladorComercios::class."@insertarComercio");