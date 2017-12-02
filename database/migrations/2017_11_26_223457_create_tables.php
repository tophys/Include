<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //CRIAÇÃO DAS TABELAS
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->boolean('ativo');
            $table->timestamps();
        });

        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->integer('materia_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('ativo');
            $table->timestamps();
        });

        Schema::create('turma_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('turma_id')->unsigned();
        });

        Schema::create('questoes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descricao');
            $table->integer('user_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->boolean('ativo');
            $table->boolean('traduzida');
            $table->timestamps();
        });

        Schema::create('provas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nome');
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::create('prova_turma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turma_id')->unsigned();
            $table->integer('prova_id')->unsigned();
            $table->boolean('ativo');
        });

        Schema::create('prova_questao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prova_id')->unsigned();
            $table->integer('questao_id')->unsigned();
        });

        Schema::create('alternativas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questao_id')->unsigned();
            $table->boolean('correta');
            $table->boolean('traduzida');
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::create('alternativa_questao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alternativa_id')->unsigned();
            $table->integer('questao_id')->unsigned();
        });




        //CRIAÇÃO DAS CONSTRAINTS

        Schema::table('turmas', function(Blueprint $table){
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('turma_user', function(Blueprint $table){
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('questoes', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('materia_id')->references('id')->on('materias');
        });

        Schema::table('provas', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('prova_turma', function(Blueprint $table){
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->foreign('turma_id')->references('id')->on('turmas');
        });

        Schema::table('prova_questao', function(Blueprint $table){
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->foreign('questao_id')->references('id')->on('questoes');
        });

        Schema::table('alternativas', function(Blueprint $table){
            $table->foreign('questao_id')->references('id')->on('questoes');
        });

        Schema::table('alternativa_questao', function(Blueprint $table){
            $table->foreign('alternativa_id')->references('id')->on('alternativas');
            $table->foreign('questao_id')->references('id')->on('questoes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
