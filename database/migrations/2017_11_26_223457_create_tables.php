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
            $table->string('src');
            $table->boolean('traduzida');
            $table->timestamps();
        });

        Schema::create('provas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nome');
            $table->integer('materia_id')->unsigned();
            $table->boolean('ativo');
            $table->timestamps();
        });

        /*
        Schema::create('agendamento_prova', function (Blueprint $table){
            $table->increments('id');
            $table->integer('agendamento_id')->unsigned();
            $table->integer('prova_id')->unsigned();
        });*/

        Schema::create('agendamentos', function(Blueprint $table){
            $table->increments('id');
            $table->integer('turma_id')->unsigned();
            $table->integer('prova_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->date('data_liberada');
            $table->boolean('ativo');
            $table->boolean('executado');
            $table->timestamps();
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
            $table->boolean('ativo');
            $table->string('src');
            $table->text('descricao');
            $table->timestamps();
        });

        Schema::create('realizadas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('agendamento_id')->unsigned();
        });

        Schema::create('respostas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('agendamento_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('questao_id')->unsigned();
            $table->integer('alternativa_id')->unsigned();
            $table->boolean('correta');
        });




        //CRIAÇÃO DAS CONSTRAINTS

        Schema::table('realizadas', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('agendamento_id')->references('id')->on('agendamentos');
        });

        Schema::table('respostas', function(Blueprint $table)
        {
            $table->foreign('agendamento_id')->references('id')->on('agendamentos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('questao_id')->references('id')->on('questoes');
            $table->foreign('alternativa_id')->references('id')->on('alternativas');
        });

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
            $table->foreign('materia_id')->references('id')->on('materias');
        });
        /*
        Schema::table('agendamento_prova', function(Blueprint $table){
            $table->foreign('prova_id')->references('id')->on('provas');
            4$table->foreign('agendamento_id')->references('id')->on('agendamentos');
        });*/

        Schema::table('agendamentos', function(Blueprint $table){
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->foreign('professor_id')->references('id')->on('users');
        });

        Schema::table('prova_questao', function(Blueprint $table){
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->foreign('questao_id')->references('id')->on('questoes');
        });

        Schema::table('alternativas', function(Blueprint $table){
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
